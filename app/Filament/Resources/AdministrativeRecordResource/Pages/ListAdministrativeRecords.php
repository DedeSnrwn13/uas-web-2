<?php

namespace App\Filament\Resources\AdministrativeRecordResource\Pages;

use App\Filament\Resources\AdministrativeRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdministrativeRecords extends ListRecords
{
    protected static string $resource = AdministrativeRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
