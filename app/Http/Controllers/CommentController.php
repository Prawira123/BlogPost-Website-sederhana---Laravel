<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, Post $post){
        $validate = Validator::make($request->all(), [
            'content' => 'required',
        ]);

        if($validate->fails()){
            return response()->json(['error' => $validate->errors()->all()]);
        }

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'content' => $request->content,
        ]);

        return redirect()->route('membership.detailPost', $post->id)->with('success', 'Comment added successfully');
    }
}
