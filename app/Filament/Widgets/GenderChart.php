<?php

namespace App\Filament\Widgets;

use App\Models\Resident;
use Illuminate\Support\Number;
use Filament\Widgets\ChartWidget;

class GenderChart extends ChartWidget
{
    protected static ?string $heading = 'Total Penduduk Berdasarkan Jenis Kelamin';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $maleCount = Resident::where('gender', 'male')->count();
        $femaleCount = Resident::where('gender', 'female')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Penduduk',
                    'data' => [Number::format($maleCount), Number::format($femaleCount)],
                    'backgroundColor' => ['#3490dc', '#E32F65'],
                ],
            ],
            'labels' => ['Laki-laki', 'Perempuan'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
