<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ConvertVideoForDownloading;
use App\Models\Video;

class PostController extends Controller
{
    public function landing()
    {
        return Inertia::render('Welcome');
    }

    public function show(User $user, Post $post)
    {
        return Inertia::render('Post/Show', [
            // 'user'  =>  UserResource::make($post->user()),
            'post'  =>  PostResource::make($post),
            'user'      =>  [
                'name'          =>  $post->user->name,
                'username'      =>  $post->user->username,
                'avatar'        =>  $post->user->profile_photo_url
            ]
        ]);
    }

    public function create()
    {
        return Inertia::render('Post/Create');
    }

    public function store(Request $request)
    {
        $post = $request->validate([
            'description'      =>  'required|min:1|max:500',
            // 'image'            => ['nullable','mimes:jpg,jpeg,png,gif','max:500048'],
            // 'video'            => 'nullable|file|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,video/mpeg,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi|max:50240',
            // 'tags'             => 'nullable',
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
                    ]);
        
                    Video::find($request->videoIds)->each->update([
                        'model_id'      =>  $post->id,
                        'model_type'    =>  Post::class
                    ]);
                } else {
                $post['user_id'] = auth()->user()->id;
                $post = Post::create($post);
            }
        }

        // if ($request->hasFile('image')) {
        //     $post['image'] = $request->file('image')->store('uploads/images', 'public');
        // }

        // $post['user_id'] = auth()->user()->id;


        return back();
    }

    public function like(Post $post)
    {
        if (auth()->user()->hasLiked($post)) {
            auth()->user()->unlike($post);
        } else {
            auth()->user()->toggleLike($post);
        }
        return back();
    }

    public function destroy(Post $post)
    {
        if (!Gate::allows('delete-post', $post)) {
            abort(403);
        }

        File::delete(public_path('uploads/videos/') . $post->id . '.mp4');

        // Delete the file
        File::delete($post->path);

        $post->delete();
        return redirect('/home')->with('message', 'Post deleted successfully.');
    }
}
