<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\FollowResource;
use App\Http\Resources\FollowersResource;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('User/Users', [
            'users'     =>  UserResource::collection(
                User::with('posts', 'likes', 'followers', 'followables')
                    ->latest()
                    ->when($request->input('search'), function ($query, $search) {
                        $query->where('username', 'like', "%{$search}%");
                    })
                    ->paginate(15)
                    ->withQueryString()
            ),
            'filters'           =>  $request->only(['search']),
            'usercount'         =>  User::latest()->count()
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

    public function followers(User $user)
    {
        // $followers = $user->followers;
        $followers = $user->followers()->latest()->paginate();

        return Inertia::render('User/Followers', [
            'profile'       =>  UserResource::make($user),
            'followers'     =>  FollowersResource::collection($followers)
            // 'followers'     =>  FollowersResource::collection(
            //     $user->followers()
            //          ->latest()
            //          ->paginate()
            // )
        ]);
    }

    public function follows(User $user)
    {
        // $follows = $user->followables()->latest()->paginate();
        // $follows = $user->followings()->latest()->paginate();
        return Inertia::render('User/Follows', [
            'profile'       =>  UserResource::make($user),
            'follows'       =>  $user->followings()->followable
            // 'follows'       =>  FollowResource::collection($follows)
            //  'follows'       =>  FollowResource::collection(
            //             $user->followings
            //           //->latest()
            //           //->paginate()
            //           //->get()
            //  )
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
