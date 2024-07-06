<?php

namespace App\Filament\Resources\ResidentResource\Pages;

use Filament\Actions;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ResidentResource;

class CreateResident extends CreateRecord
{
    protected static string $resource = ResidentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        $age = Carbon::parse($data['birthdate'])->age;

        if ($age < 5) {
            $data['age_category'] = 'Balita';
        } elseif ($age >= 5 && $age < 12) {
            $data['age_category'] = 'Anak-anak';
        } elseif ($age >= 12 && $age < 18) {
            $data['age_category'] = 'Remaja';
        } elseif ($age >= 18 && $age < 60) {
            $data['age_category'] = 'Dewasa';
        } else {
            $data['age_category'] = 'Lansia';
        }

        return $data;
    }
}