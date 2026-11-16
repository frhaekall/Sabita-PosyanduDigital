<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosyanduSchedule extends Model
{
    protected $fillable = [
        'nama_kegiatan',
        'jenis_layanan',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
        'kuota',
        'deskripsi',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'kuota' => 'integer',
        ];
    }
}
