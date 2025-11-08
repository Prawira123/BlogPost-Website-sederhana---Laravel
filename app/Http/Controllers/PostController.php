<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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
        $posts = Post::with('user', 'category')->orderByDesc('created_at')
            ->get();
        return view('guest.allPost', compact('posts'));
    }

    public function detailPost($id){
        $post = Post::with('user', 'category', 'comments')->find($id);
        $relatedPosts = Post::where('user_id', $post->user_id)
        ->where('id', '!=', $post->id)
        ->latest()
        ->take(3)
        ->get();

        $comments = $post->comments()->with('user')
            ->orderByDesc('created_at')
            ->get();

        return view('membership.blogPage', compact('post', 'comments', 'relatedPosts'));
    }

    public function addBlog(){
        $categories = Category::all();

        return view('user.storeBlog', compact('categories'));
    }

    public function store(Request $request){
         $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'thumbnail' => 'required|string',
        'category' => 'required|exists:categories,id',
        ]);

        $user = auth()->user();

        $user->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $request->thumbnail,
            'category_id' => $request->category,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('membership.homepage');
    }

    public function edit($id){
        $post = Post::with('user', 'category')->find($id);
        $categories = Category::all();
        return view('user.editBlog', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'thumbnail' => 'required|string',
            'category' => 'required|exists:categories,id',
        ]);

        $user = auth()->user();
        $post = $user->posts()->findOrFail($id); // hanya post milik user login

        // Generate slug unik
        $slug = Str::slug($request->title);
        $original = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = "{$original}-{$count}";
            $count++;
        }

        // Update data
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $request->thumbnail,
            'category_id' => $request->category,
            'slug' => $slug,
        ]);

        return redirect()->route('membership.homepage')->with('success', 'Post updated successfully.');
    }
    
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('membership.homepage')->with('success', 'Post deleted successfully.');
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

        return view('guest.allPost', compact('posts', 'search'));
    }

    public function searchingAuthor(Request $request){
        $search = $request->input('search');

        $authors = User::withCount('posts')->when($search, function($query, $search){
            return $query->where('name', 'like', "%{$search}%");
        })->orderByDesc('posts_count')->latest()->get();

        return view('guest.authorsPage', compact('authors', 'search'));
    }
    
}
