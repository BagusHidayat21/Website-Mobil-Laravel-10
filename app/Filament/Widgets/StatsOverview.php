<?php

namespace App\Filament\Widgets;

use App\Models\Pengembalian;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\Car;
use App\Models\Sewa;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Mobil', Car::count()),
            Stat::make('Mobil Yang Tersedia', Car::where('status', '=', 'Tersedia')->count()),
            Stat::make('Mobil Yang Disewa', Car::where('status', '=', 'Tidak Tersedia')->count()),
            Stat::make('Mobil Yang Telah Dikembalikan', Pengembalian::count()),
            Stat::make('Pendapatan', 'Rp. ' . number_format(Sewa::where('status_pembayaran', 'Pembayaran Selesai')->sum('total'), 0, ',', '.'))
                ->description('Pendapatan Diperoleh')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')

        ];
    }
}
