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
                ->withQueryString()
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
                ->withQueryString()
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
