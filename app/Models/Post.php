<?php

namespace App\Models;

use Illuminate\Validation\Rules\File;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Mews\Purifier\Casts\CleanHtml;
use Mews\Purifier\Casts\CleanHtmlInput;

class Post extends Model
{
    use HasFactory;
    use Likeable;

    protected $fillable = [
        'user_id',
        'description',
        'video',
        'status',
        'image',
        'title',
        'tags',
        'original_name',
        'disk',
        'path',
        'converted_for_downloading_at',
        'is_nsfw',
        'converted_for_streaming_at'
    ];

    protected $casts = [
        // 'description' => CleanHtmlInput::class, // cleans both when getting and setting the value
    ];

    public function scopeFilter($query, array $filters)
    {
        // Search for status
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
        );
    }

    public function incrementReadCount() 
    {
        $this->reads++;
        return $this->save();
    }

    public function delete()
    {
        if ($this->attributes['path']) {
            $file = $this->attributes['path'];
            if (File::isFile($file)) {
                File::delete($file);
            }
        }
        parent::delete();
    }

    // Relation to user
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
