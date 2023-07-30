<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function landing()
    {
        return Inertia::render('Welcome');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'description'   =>  'required|min:1|max:500',
            //'status'        =>  'nullable',
            //'nsfw'          =>  'nullable|boolean',
            //'video'         =>  'nullable|file|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,video/mpeg,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi|max:10240',
        ]);

        // if($request->hasFile('files')) 
        // {
        //    $attributes['files'] = $request->file('files')->store('uploads/images/', 'public');
        // }

        $attributes['user_id'] = auth()->user()->id;

        $attributes = Post::create([
            'user_id'       =>  auth()->user()->id,
            //'status'        =>  $request->status,
            //'is_nsfw'       =>  $request->nsfw,
            //'disk'          =>  'public',
            //'original_name' =>  $request->file('video')->getClientOriginalName(),
            //'path'          =>  $request->file('video')->store('uploads' . $request['user_id'] . '/' . 'videos/', 'public'),
            'description'   =>  $request->description
        ]);

        //$this->dispatch(new ConvertVideoForStreaming($attributes));
        //$this->dispatch(new ConvertVideoForDownloading($attributes));

        return back();
    }
}
