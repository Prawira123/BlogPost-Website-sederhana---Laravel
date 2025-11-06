@extends('layouts.detailBlog')

<x-navbar-member></x-navbar-member>

@section('content')

    <x-detail-post.header :imageProfile="$post->user->imageProfile" :username="$post->user->name" :email="$post->user->email" :date="$post->created_at" :title="$post->title" :iduser="$post->user_id" :id="$post->id" ></x-detail-post.header>

    <x-detail-post.content :content="$post->content" :thumbnail="$post->thumbnail" :username="$post->user->name"></x-detail-post.content>

    @auth
    <x-detail-post.comment-form 
        :commentCount="$post->comments->count()" 
        :action="route('membership.comment.store', $post->id)" />
    @endauth

    @guest
        <x-detail-post.comment-form 
            :commentCount="$post->comments->count()" 
            :action="route('login')" />
    @endguest

    
   
    @foreach ($comments as $comment )
            <x-detail-post.comment-list :imageProfile="$comment->user->imageProfile" :username="$comment->user->name" :date="$comment->created_at->diffForHumans(['parts' => 2])" :content="$comment->content" :iduser="$comment->user->id"></x-detail-post.comment-list>
    @endforeach
@endsection

@section('related-blog')
@foreach ($relatedPosts as $post )
    <x-detail-post.related-blog :thumbnail="$post->thumbnail"  :title="$post->title" :content="Str::words($post->content, 20, '...')" :id="$post->id"></x-detail-post.related-blog>
@endforeach
@endsection
   



