<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'converted_for_downloading_at'      =>  $this->converted_for_downloading_at !== null ? $this->converted_for_downloading_at : null,
            'created_at'                        =>  $this->created_at,
            'mime_type'                         =>  $this->mime_type,
            // 'path'                              =>  $this->path !== null ? Storage::disk('public')->url('media/' . $this->user_id . '/videos/converted/' . $this->video->id . '.mp4') : null,
        ];
    }
}
