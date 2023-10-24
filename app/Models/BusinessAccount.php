<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address',
        'name',
    ];

    public function admins(): BelongsToMany
    {
        return $this->users()->where('role', 'admin');
    }

    public function creditCards(): HasMany
    {
        return $this->hasMany(CreditCard::class);
    }

    public function members(): BelongsToMany
    {
        return $this->users()->where('role', 'member');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
