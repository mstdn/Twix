<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class FollowersResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id'                 =>  $this->id,
            'name'               =>  $this->name,
            'username'           =>  $this->username,
            'about'              =>  $this->about,
            'time'               =>  $this->created_at->diffForHumans(),
            'avatar'             =>  $this->profile_photo_url,
            'followerscount'     =>  $this->followers()->count(),
            'followcount'        =>  $this->followings()->count(),
            'postamount'         =>  $this->posts->count(),
            'is'                 => [
                'following'      =>  Auth::user() ? Auth::user()->isFollowing($this->resource) : null,
                'self'           =>  Auth::user() ? Auth::user()->is($this->resource) : null
            ]
        ];
    }
}
