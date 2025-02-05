<?php

namespace App\Filament\Exports;

use App\Models\Resident;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ResidentExporter extends Exporter
{
    protected static ?string $model = Resident::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user.name'),
            ExportColumn::make('name'),
            ExportColumn::make('gender'),
            ExportColumn::make('birthdate'),
            ExportColumn::make('birthplace'),
            ExportColumn::make('address'),
            ExportColumn::make('phone'),
            ExportColumn::make('age_category'),
            ExportColumn::make('life_status'),
            ExportColumn::make('date_of_death'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your resident export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
