<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('User/Index', [
            'users'     =>  UserResource::make(
                User::query()
                    ->with('posts')
                    ->latest()
                    ->paginate(25)
                    ->withQueryString()
            ),
            'filters' =>  $request->only(['search']),
        ]);
    }

    public function show(User $user, Request $request)
    {
        return Inertia::render('User/Show', [
            'profile'       =>  UserResource::make($user),
            'posts'         =>  PostResource::collection(
                $user->posts()
                    //->withCount('replies')
                    ->latest()
                    ->paginate(10)
            ),
            'filters' =>  $request->only(['search']),
        ]);
    }

    public function follow(User $user)
    {
        if (auth()->user()->isFollowing($user)) {
            auth()->user()->unfollow($user);
        } else {
            auth()->user()->toggleFollow($user);
            //$user->notify(new FollowNotifications($user, auth()->user()));
        }

        return back();
    }
}
