<?php

namespace App\Filament\Widgets;

use App\Models\Resident;
use Filament\Widgets\ChartWidget;

class LifeStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Total Penduduk Berdasarkan Status Hidup';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $aliveCount = Resident::where('life_status', 'hidup')->count();
        $deceasedCount = Resident::where('life_status', 'meninggal')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Penduduk',
                    'data' => [$aliveCount, $deceasedCount],
                    'backgroundColor' => ['#38c172', '#e3342f'],
                ],
            ],
            'labels' => ['Masih Hidup', 'Meninggal'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
