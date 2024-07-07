<?php

namespace App\Filament\Widgets;

use App\Models\Resident;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Support\Number;

class FirstOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalResidents = Resident::count();
        $totalBalita = Resident::where('age_category', 'Balita')->count();
        $totalAnakAnak = Resident::where('age_category', 'Anak-anak')->count();
        $totalRemaja = Resident::where('age_category', 'Remaja')->count();
        $totalDewasa = Resident::where('age_category', 'Dewasa')->count();
        $totalLansia = Resident::where('age_category', 'Lansia')->count();

        return [
            Stat::make('Total Penduduk', Number::format($totalResidents))
                ->description('Jumlah keseluruhan penduduk')
                ->color('primary'),
            Stat::make('Total Penduduk Balita', Number::format($totalBalita))
                ->description('Penduduk dengan kategori Balita')
                ->color('success'),
            Stat::make('Total Penduduk Anak-anak', Number::format($totalAnakAnak))
                ->description('Penduduk dengan kategori Anak-anak')
                ->color('info'),
            Stat::make('Total Penduduk Remaja', Number::format($totalRemaja))
                ->description('Penduduk dengan kategori Remaja'),
            Stat::make('Total Penduduk Dewasa', Number::format($totalDewasa))
                ->description('Penduduk dengan kategori Dewasa')
                ->color('danger'),
            Stat::make('Total Penduduk Lansia', Number::format($totalLansia))
                ->description('Penduduk dengan kategori Lansia')
                ->color('secondary'),
        ];
    }
}
