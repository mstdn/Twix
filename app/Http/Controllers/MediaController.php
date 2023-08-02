<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file'  =>  ['nullable','mimes:jpg,jpeg,png,gif','max:500048'],
        ]);

        $file = $request->file('file');
        $file->store('media/' . $request->user()->id . '/' . now()->format('Y') . '/' . now()->format('m'), 'public');

        $media = Media::create([
            'filename'      =>  $file->hashName(),
            'mime_type'     =>  $file->getMimeType(),
            'size'          =>  $file->getSize(),
            'user_id'       =>  $request->user()->id,
        ]);

        return response()->json([
            'id'            =>  $media->id,
        ]);
    }

    public function destroy(Media $media)
    {
        /* if (!Gate::allows('delete-media', $media)) {
            abort(403);
        } */

        Storage::disk('public')
        ->delete('media/' . $media->user_id . '/' . now()->format('Y') . '/' . now()->format('m') . '/' . $media->filename);

        $media->delete();

        return response()->json([
            'message'   => 'Succes.'
        ]);
    }
}
