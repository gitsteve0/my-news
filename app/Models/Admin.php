<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'username', 'password', 'type'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'password' => 'hashed'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
