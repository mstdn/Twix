<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Media;
use App\Models\Reply;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return Inertia::render('Reply/Create', [
            'post'      =>  $post
        ]);
    }

    public function store(Request $request)
    {
        $post = $request->validate([
            'description'      =>  'required|min:1|max:500',
            'disk'             => 'public',
            'mediaIds'         =>  ['nullable','array','min:0','max:4'],
            'mediaIds.*'       =>  
            [
                'nullable',
                Rule::exists('media', 'id')
                    ->where(function ($query) use ($request) {
                        $query->where('user_id', $request->user()->id);
                    })
            ],
            'videoIds'         =>  ['nullable','array','min:0','max:1'],
            'videoIds.*'       =>  
            [
                'nullable',
                Rule::exists('videos', 'id')
                    ->where(function ($query) use ($request) {
                        $query->where('user_id', $request->user()->id);
                    })
            ],
        ]);

        if ($request->mediaIds) {
            $post = Post::create([
                'user_id'       =>  $request->user()->id,
                'description'   =>  $request->description,
                'reply_to'      =>  $request->postId
            ]);

            Media::find($request->mediaIds)->each->update([
                'model_id'      =>  $post->id,
                'model_type'    =>  Post::class
            ]);
        } else {
            // if ($request->hasFile('video')) {
            //     $post['video'] = $request->file('video')->store('uploads/videos', 'public');
            //     $post = Post::create([
            //         'disk'          => 'public',
            //         'original_name' => $request->video->getClientOriginalName(),
            //         'path'          => $request->video->store('videos', 'public'),
            //         'user_id'       => auth()->id(),
            //         'description'   => $request->description,
            //     ]);
            //     ConvertVideoForDownloading::dispatch($post);
            // } else {
                if ($request->videoIds) {
                    $post = Post::create([
                        'user_id'       =>  $request->user()->id,
                        'description'   =>  $request->description,
                        'reply_to'      =>  $request->postId
                    ]);
        
                    Video::find($request->videoIds)->each->update([
                        'model_id'      =>  $post->id,
                        'model_type'    =>  Post::class
                    ]);
                } else {
                $post['user_id'] = auth()->user()->id;
                $post['reply_to']   =   $request->postId;
                $post = Post::create($post);
            }
        }

        // return back();
        return to_route('home');

    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
