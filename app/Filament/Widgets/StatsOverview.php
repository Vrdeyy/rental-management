<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pending Bookings', Booking::where('status', 'pending')->count())
                ->description('Perlu di-approve')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
                
            Stat::make('Active Bookings', Booking::where('status', 'approved')->count())
                ->description('Sedang disewa')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('info'),
                
            Stat::make('Total Earnings', 'Rp ' . number_format(Booking::where('status', 'done')->sum('total_price'), 0, ',', '.'))
                ->description('Cuan dari booking selesai')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}