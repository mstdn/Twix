<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ConvertVideoForDownloading;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        $file->store('videos/' . $request->user()->id . '/' . now()->format('Y') . '/' . now()->format('m'), 'public');

        $video = Video::create([
            'filename'      =>  $file->hashName(),
            'user_id'       =>  $request->user()->id,
            'disk'          => 'public',
            'original_name' => $file->getClientOriginalName(),
            'path'          => $file->store('videos', 'public'),

        ]);

        ConvertVideoForDownloading::dispatch($video);

        return response()->json([
            'id'            =>  $video->id,
        ]);
    }

    public function destroy(Video $video)
    {
        /* if (!Gate::allows('delete-media', $media)) {
            abort(403);
        } */

        Storage::disk('public')
        ->delete('video/' . $video->user_id . '/' . now()->format('Y') . '/' . now()->format('m') . '/' . $video->filename);

        $video->delete();

        return response()->json([
            'message'   => 'Succes.'
        ]);
    }
}
