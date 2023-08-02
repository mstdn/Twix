<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             =>  $this->id,
            'name'           =>  Str::limit($this->name, 16),
            'about'          =>  $this->about,
            'avatar'         =>  $this->profile_photo_url,
            //'avatar'         =>  $this->getProfilePhotoUrlAttribute(),
            'time'           =>  $this->created_at->diffForHumans(),
            'username'       =>  $this->username,
            'website'        =>  Str::limit($this->website, 32),
            'url'            =>  $this->website,
            'postamount'     =>  $this->posts->count(),
            'followerscount' =>  $this->followers()->count(),
            'followcount'    =>  $this->followings()->count(),
            'isFollowing'    =>  Auth::user() ? Auth::user()->isFollowing($this->resource) : null,
            'isFollowedBy'   =>  Auth::user() ? Auth::user()->isFollowedBy($this->resource) : null,
            'followbutton'   =>  Auth::user() ? Auth::user()->is($this->resource) : null,
            'is'            => [
                'following'     =>  Auth::user() ? Auth::user()->isFollowing($this->resource) : null,
                'self'          =>  Auth::user() ? Auth::user()->is($this->resource) : null
            ]
        ];
    }
}
