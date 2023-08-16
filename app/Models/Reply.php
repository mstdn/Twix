<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function videos(): MorphMany
    {
        return $this->morphMany(Video::class, 'model');
    }
}
