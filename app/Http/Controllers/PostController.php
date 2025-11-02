<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

        return view('membership.postsPage', compact('posts'));
    }

}
