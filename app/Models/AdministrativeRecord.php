<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdministrativeRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'document_type',
        'document_number',
        'description',
        'issued_at'
    ];

    public function resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class);
    }
}