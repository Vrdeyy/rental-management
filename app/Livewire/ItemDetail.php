<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Booking;
use Livewire\Component;
use Carbon\Carbon;

class ItemDetail extends Component
{
    public $item;
    public $startDate;
    public $endDate;
    public $totalPrice = 0;

    public function mount($id)
    {
        $this->item = Item::findOrFail($id);
    }

    // Fungsi otomatis kepanggil pas user ganti tanggal
    public function updated($propertyName)
    {
        if ($this->startDate && $this->endDate) {
            $start = Carbon::parse($this->startDate);
            $end = Carbon::parse($this->endDate);

            // Kalau tanggal selesai sebelum tanggal mulai, set 0
            if ($start->gt($end)) {
                $this->totalPrice = 0;
                return;
            }

            $days = $start->diffInDays($end) + 1;

            if ($days > 0) {
                // Pastiin harga item-nya ada isinya
                $price = $this->item->price_per_day ?? 0;
                $this->totalPrice = $days * $price;
            } else {
                $this->totalPrice = 0;
            }
        }
    }

    public function book()
    {
        $this->validate([
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after:startDate',
        ]);

        // CEK STOK VIA MODEL LOGIC
        $available = $this->item->getAvailableStock($this->startDate, $this->endDate);

        if ($available <= 0) {
            session()->flash('error', 'Waduh tot, stok abis buat tanggal itu!');
            return;
        }

        // SIMPAN BOOKING
        Booking::create([
            'user_id' => auth()->id() ?? 1, // Sementara default ke ID 1 kalo belum login
            'item_id' => $this->item->id,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'total_price' => $this->totalPrice,
            'status' => 'pending',
        ]);

        session()->flash('success', 'Booking berhasil dikirim! Tunggu admin approve ya.');
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.item-detail');
    }
}
