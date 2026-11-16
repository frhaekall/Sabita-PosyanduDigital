<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pregnancy extends Model
{
    protected $fillable = [
        'user_id',
        'nik',
        'nama_ibu',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'tanggal_hpht',
        'tanggal_hpl',
        'nama_suami',
        'golongan_darah',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'tanggal_hpht' => 'date',
            'tanggal_hpl' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
