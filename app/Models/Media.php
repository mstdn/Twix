<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    protected $fillable = [
        'filename',
        'model',
        'mime_type',
        'size',
        'user_id',
        'model_id',
        'model_type'
    ];

    protected $appends = ['full_url'];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function getFullUrlAttribute()
    {
        return url('storage/media/' . $this->user_id . '/' . $this->created_at->format('Y') . '/' . $this->created_at->format('m') . '/' . $this->filename);
    }
}
