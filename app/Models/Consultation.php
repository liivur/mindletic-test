<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Consultation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'end_at',
        'professional_id',
        'start_at',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'end_at' => 'datetime',
        'professional_id' => 'integer',
        'start_at' => 'datetime',
        'user_id' => 'integer',
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function professional(): HasOne
    {
        return $this->hasOne(Professional::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
