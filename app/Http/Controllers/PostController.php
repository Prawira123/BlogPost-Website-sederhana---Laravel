<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
    ];

    public function index(){
        $posts = Post::with('user', 'category')->get();
        return view('post.allPost', compact('posts'));
    }
    public function indexMembership(){
        $posts = Post::with('user', 'category')->get();
        return view('membership.homepage', compact('posts'));
    }

    public function postsMember(){
        $posts = Auth::user()->posts()->get();
        $user = Auth::user();

        return view('membership.profilePage', compact(['posts', 'user']));
    }

    public function detailPost($id){
        $post = Post::with('user', 'category', 'comments')->find($id);
        $relatedPosts = Post::where('user_id', $post->user_id)
        ->where('id', '!=', $post->id)
        ->latest()
        ->take(3)
        ->get();

        $comments = $post->comments()->get();
        return view('membership.blogPage', compact('post', 'comments', 'relatedPosts'));
    }

}
