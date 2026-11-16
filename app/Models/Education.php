<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    // Nama tabel harus sama dengan tabel di migration
    protected $table = 'educations';

    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'kategori',
        'ringkasan',
        'isi',
        'gambar',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

