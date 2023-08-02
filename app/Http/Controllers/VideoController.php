<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ConvertVideoForDownloading;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file'  =>  'file|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,video/mpeg,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi|max:50240',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'   => 'Error.'
            ]);
        } else {
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
