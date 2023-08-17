<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;
use Stevebauman\Purify\Facades\Purify;

class PostResource extends JsonResource
{
    public static $wrap = null;
    public function toArray($request)
    {
        return [
            'id'                =>  $this->id,
            'description'       =>  $this->description, // Purify::clean($this->description),
            'time'              =>  $this->created_at->diffForHumans(),
            'username'          =>  $this->user->username,
            'status'            =>  $this->status,
            'avatar'            =>  $this->user->profile_photo_url,
            'isliked'           =>  Auth::user() ? $this->isLikedBy(Auth::user()) : null,
            'likes'             =>  $this->likers()->count(),
            'user'              =>  UserResource::make($this->user),
            'delete'            =>  Auth::user() ? Auth::user()->can('delete-post', $this->resource) : null,
            'count'             =>  $this->replies->count(),
            'user'              =>  UserResource::make($this->user),
            'media'             =>  $this->media->isNotEmpty() ? $this->media : null,
            'video'             =>  $this->videos->isNotEmpty() ? $this->videos : null,
            
            // 'media'             =>  $this->media !== null ? $this->media : null,
            // 'video'             =>  $this->videos !== null ? $this->videos : null,
            // 'video'             =>  $this->videos !== null ? VideoResource::collection($this->videos) : null,
            // 'video'             =>  $this->videos->isNotEmpty() ? VideoResource::collection($this->videos) : null,
            //'video'             =>  $this->converted_for_downloading_at !== null ? Storage::disk('public')->url('uploads/' . $this->user->id . '/' . 'videos/' . $this->id . '.mp4') : null,
            // 'hls'               =>  Storage::disk('public')->url('uploads/' . $this->user->id . '/' . 'videos/' . $this->id . '.m3u8'),
            //'replycount'        =>  $this->replies->count(),
            //'replies'           =>  ReplyResource::collection($this->whenLoaded('replies'))
        ];
    }
}
