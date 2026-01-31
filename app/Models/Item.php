<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'stock', 'price_per_day', 'image'];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    // Logic buat cek sisa stok di tanggal tertentu
    public function getAvailableStock($startDate, $endDate)
    {
        $bookedCount = $this->bookings()
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate])
                      ->orWhere(function ($q) use ($startDate, $endDate) {
                          $q->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                      });
            })
            ->count();

        return $this->stock - $bookedCount;
    }
}
