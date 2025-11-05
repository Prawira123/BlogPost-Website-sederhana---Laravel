@extends('layouts.homepage')

@section('title-page', 'Home')

<x-navbar>
    
</x-navbar>

@section('post')
<div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">From the blog</h2>
      <p class="mt-2 text-lg/8 text-gray-300">Learn how to grow your business with our expert advice.</p>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        @foreach ($posts as $post)
            <x-card-post :title="$post->title" :content="$post->content" :date="$post->created_at" :img="$post->img" :name="$post->user->name" :category="$post->category->name"
              :id="$post->id" :address="$post->user->address" ></x-card-post>
        @endforeach
    </div>
  </div>
</div>
@endsection