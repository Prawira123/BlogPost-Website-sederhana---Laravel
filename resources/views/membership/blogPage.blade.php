@extends('layouts.detailBlog')


@section('content')

    <x-detail-post.header :imageProfile="$post->user->imageProfile" :username="$post->user->name" :email="$post->user->email" :date="$post->created_at" :title="$post->title" ></x-detail-post.header>

    <x-detail-post.content :content="$post->content" :thumbnail="$post->thumbnail" :username="$post->user->name"></x-detail-post.content>

    <x-detail-post.comment-form :commentCount="$post->comments->count()"></x-detail-post.comment-form>
   
    @foreach ($comments as $comment )
            <x-detail-post.comment-list :imageProfile="$comment->user->imageProfile" :username="$comment->user->name" :date="$post->created_at->diffForHumans()" :content="$comment->content"></x-detail-post.comment-list>
    @endforeach
@endsection

@section('related-blog')
@foreach ($relatedPosts as $post )
    <x-detail-post.related-blog :thumbnail="$post->thumbnail"  :title="$post->title" :content="Str::words($post->content, 20, '...')" ></x-detail-post.related-blog>
@endforeach
@endsection
   



