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
}
