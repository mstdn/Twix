<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Video extends Model
{
    protected $fillable = [
        'original_name',
        'path',
        'mime_type',
        'disk',
        'user_id',
        'model_id',
        'model_type',
        'model',
        'converted_for_downloading_at',
        'converted_for_streaming_at',
        'filename'
    ];

    protected $appends = ['full_url'];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function getFullUrlAttribute()
    {
        return url('storage/videos/' . $this->user_id . '/' . $this->created_at->format('Y') . '/' . $this->created_at->format('m') . '/' . $this->filename);
    }
}
