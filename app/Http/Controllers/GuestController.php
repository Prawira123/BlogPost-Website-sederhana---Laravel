<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function detailProfile($id){
        $user = User::findOrFail($id);
        $posts = $user->posts()->get();
        return view('guest.profilePage', compact('user', 'posts'));
    }

    public function detailPostGuest($id){
        $post = Post::with('user', 'category', 'comments')->find($id);
        $relatedPosts = Post::where('user_id', $post->user_id)
        ->where('id', '!=', $post->id)
        ->latest()
        ->take(3)
        ->get();

        $comments = $post->comments()->with('user')
            ->orderByDesc('created_at')
            ->get();

        return view('guest.blogPage', compact('post', 'comments', 'relatedPosts'));
    }
}
