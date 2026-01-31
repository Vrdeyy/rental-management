<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = ['user_id', 'item_id', 'start_date', 'end_date', 'total_price', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    protected static function booted()
{
    static::updated(function ($booking) {
        // 1. Kalo status berubah jadi 'approved' -> Kurangi Stok
        if ($booking->wasChanged('status') && $booking->status === 'approved') {
            $booking->item->decrement('stock');
        }

        // 2. Kalo status berubah jadi 'done' atau 'cancelled' -> Balikin Stok
        // Tapi pastiin sebelumnya statusnya emang 'approved' (barang lagi dipake)
        if ($booking->wasChanged('status') && 
            in_array($booking->status, ['done', 'cancelled']) && 
            $booking->getOriginal('status') === 'approved') {
            
            $booking->item->increment('stock');
        }
    });

    static::created(function ($booking) {
        // Opsional: Kalo mau pas buat langsung approved (misal admin yang buat), 
        // stok juga langsung berkurang
        if ($booking->status === 'approved') {
            $booking->item->decrement('stock');
        }
    });
}
}