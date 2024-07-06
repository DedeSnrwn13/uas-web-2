<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'birthdate',
        'birthplace',
        'address',
        'phone',
        'age_category',
        'life_status',
        'date_of_death'
    ];

    protected static function booted()
    {
        static::saving(function ($resident) {
            $age = Carbon::parse($resident->birthdate)->age;

            if ($age < 5) {
                $resident->age_category = 'Balita';
            } elseif ($age >= 5 && $age < 12) {
                $resident->age_category = 'Anak-anak';
            } elseif ($age >= 12 && $age < 18) {
                $resident->age_category = 'Remaja';
            } elseif ($age >= 18 && $age < 60) {
                $resident->age_category = 'Dewasa';
            } else {
                $resident->age_category = 'Lansia';
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function family(): HasOne
    {
        return $this->hasOne(Family::class, 'head_of_family');
    }

    public function familyMembers(): HasMany
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function healthRecords(): HasMany
    {
        return $this->hasMany(HealthRecord::class);
    }

    public function administrativeRecords(): HasMany
    {
        return $this->hasMany(AdministrativeRecord::class);
    }
}