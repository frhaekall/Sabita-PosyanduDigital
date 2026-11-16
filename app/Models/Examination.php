<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Examination extends Model
{
    protected $fillable = [
        'registration_id',
        'tanggal_pemeriksaan',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pemeriksaan' => 'date',
            'berat_badan' => 'decimal:2',
            'tinggi_badan' => 'decimal:2',
            'lingkar_kepala' => 'decimal:2',
        ];
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(
            PosyanduRegistration::class,
            'registration_id'
        );
    }
}