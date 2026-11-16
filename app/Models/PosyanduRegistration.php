<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PosyanduRegistration extends Model
{
    protected $fillable = [
        'user_id',
        'child_id',
        'schedule_id',
        'status',
        'catatan_admin',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(
            PosyanduSchedule::class,
            'schedule_id'
        );
    }

    public function examination(): HasOne
    {
        return $this->hasOne(Examination::class, 'registration_id');
    }
}
