<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;

class AdminController extends Controller
{
    public function users()
    {
        return Inertia::render('Admin/Users', [
            'users'     =>  User::all()
        ]);
    }

    public function deleteUser(User $user)
    {
        DB::table('posts')->where('user_id', '=', $user->id)->delete();
        $user->delete();

        return back();
    }

    public function posts()
    {
        return Inertia::render('Admin/Posts', [
            'posts'     =>  PostResource::collection(
                Post::query()
                    ->with('user')
                    ->latest()
                    ->paginate()
            )
        ]);
    }

    public function deletePost(Post $post)
    {
        $post->delete();

        return back();
    }
}
