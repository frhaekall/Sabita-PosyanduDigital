<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Child extends Model
{
    protected $fillable = [
        'user_id',
        'nik',
        'nama_anak',
        'tanggal_lahir',
        'jenis_kelamin',
        'tempat_lahir',
        'nama_ayah',
        'nama_ibu',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
