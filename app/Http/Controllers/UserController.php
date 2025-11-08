<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function indexMembership(){
        $posts = Post::with('user', 'category')->orderByDesc('created_at')
            ->get();
        return view('membership.homepage', compact('posts'));
    }
    
    public function detail(){
        $user = Auth::user();
        $posts = $user->posts()->get();

        return view('membership.profilePage', compact(['posts', 'user']));
    }

     public function edit(){
        $user = Auth::user();
        return view('user.editProfile', compact('user'));
    }

    public function update(Request $request){
         $request->validate([
        'name' => 'required|string|max:255',
        'imageProfile' => 'required',
        'phone' => 'nullable|string|max:12',
        'address' => 'nullable|string|max:255',
        'bio' => 'nullable|string|max:500',
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'imageProfile' => $request->imageProfile,
            'phone' => $request->phone,
            'address' => $request->address,
            'bio' => $request->bio,
        ]);

        return $this->detail();

    }

    public function index(){
        $authors = User::withCount('posts')->orderByDesc('posts_count')->get();
        return view('membership.authorsPage', compact('authors'));
    }

    public function searchingAuthor(Request $request){
        $search = $request->input('search');

        $authors = User::withCount('posts')->when($search, function($query, $search){
            return $query->where('name', 'like', "%{$search}%");
        })->orderByDesc('posts_count')->latest()->get();

        return view('membership.authorsPage', compact('authors', 'search'));
    }

    public function searchingPost(Request $request){
        $search = $request->input('search');

        $posts = Post::with(['user', 'category'])->when($search, function($query, $search){
            return $query->where('title', 'like', "%{$search}%")
            ->orWhere('content', 'like', "%{$search}%")
            ->orWhereHas('category', function($q) use ($search){
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhereHas('user', function($q) use ($search){
                $q->where('name', 'like', "%{$search}%");
            })->latest()->get();
        });

        return view('membership.homepage', compact('posts', 'search'));
    }
}
