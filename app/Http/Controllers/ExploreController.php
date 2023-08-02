<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class ExploreController extends Controller
{
    public function index(Request $request)
    {
        $posts = PostResource::collection(
            Post::query()
                ->with('user')
                ->latest()
                ->where('status', 'Public')
                ->where('is_nsfw', 0)
                ->paginate(25)
                ->withQueryString()
        );

        if ($request->wantsJson()) {
            return $posts;
        }

        return Inertia::render('Timelines/Explore', [
            'posts'     => $posts,
            'filters'   => $request->only(['search'])
        ]);
    }
}
