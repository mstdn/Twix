<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class TimelineController extends Controller
{
    // Home logged-in
    public function home(Request $request)
    {
        $posts = fn () =>
        PostResource::collection(
            Post::where(function ($query) {
                $query->where('user_id', auth()->id())
                    ->orWhereIn('user_id', auth()->user()->followings->pluck('followable_id'));
            })
                ->with('user', 'likers', 'replies')
                ->latest()
                ->where('status', 'Public')
                ->where('is_nsfw', 0)
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('description', 'like', "%{$search}%");
                })
                ->paginate(10)
            // ->withQueryString()
            // ->withCount('reply_to')
        );

        if ($request->wantsJson()) {
            return $posts;
        }

        return Inertia::render('Timelines/Home', [
            'posts'         => $posts,
            'filters'       => $request->only(['search']),
        ]);
    }


    public function public(Request $request)
    {
        $posts = PostResource::collection(
            Post::query()
                ->with('user')
                ->latest()
                ->where('status', 'Public')
                ->where('is_nsfw', 0)
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('description', 'like', "%{$search}%");
                })
                ->paginate(25)
            // ->withQueryString()
        );

        if ($request->wantsJson()) {
            return $posts;
        }

        return Inertia::render('Timelines/Public', [
            'posts' => $posts,
            'filters' => $request->only(['search'])
        ]);
    }
}
