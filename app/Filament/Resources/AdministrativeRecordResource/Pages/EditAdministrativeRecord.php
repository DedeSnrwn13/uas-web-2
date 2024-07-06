<?php

namespace App\Filament\Resources\AdministrativeRecordResource\Pages;

use App\Filament\Resources\AdministrativeRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdministrativeRecord extends EditRecord
{
    protected static string $resource = AdministrativeRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
