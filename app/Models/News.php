<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'admin_id'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
