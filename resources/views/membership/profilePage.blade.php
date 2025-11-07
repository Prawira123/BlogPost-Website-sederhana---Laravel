@extends('layouts.posts')

@section('title-page', 'Posts')

<x-navbar-member>
    @section('navbar-item')
    <a href="{{ route('membership.addBlog') }}">    
        <button type="submit" class="text-sm/6 font-semibold text-black bg-white rounded-full px-3.5 py-1.5 hover:bg-white/80 cursor-pointer hover:text-black p-10">Add New Blog<span aria-hidden="true">&rarr;</span></button>
    </a>  
    @endsection
</x-navbar-member>

@section('username', Auth::user()->name)

@section('profile')

<div class="w-full bg-gray-800  ">
    <div class="flex items-center justify-between w-full p-20">
        <div class="w-auto p-10">
            <div class="w-[300px] h-[300px] rounded-full bg-cover bg-center " style="background-image: url('{{ $user->imageProfile }}')"></div>
        </div>
        <div class="flex flex-col items-start justify-beetwen w-full h-auto p-2 gap-5">
            <div class="flex items-center justify-beetwen w-full h-auto ">
                <h1 class="text-white text-7xl font-extrabold w-full">{{ $user->name }}</h1>
                <a href="{{ route('user.edit') }}" class="w-[20%]"><button type="submit" class="text-sm/6 font-semibold text-white border-white border-2 rounded-full px-5 py-3 hover:bg-white/80 cursor-pointer hover:text-black p-10 transition-all duration-300">Edit Profile<span aria-hidden="true">&rarr;</span></button></a>
            </div> 
            <div class="flex items-center justify-beetwen w-full h-auto gap-3">
                <h3 class="text-gray-300 font-medium text-2xl hover:text-gray-100">{{ $user->email }}</h3>
                <div class="h-[20px] w-[2px] rounded-full bg-white/50 "></div>
                <h3 class="text-gray-300 font-medium text-2xl hover:text-gray-100">{{ $user->role }}</h3>
            </div>
            <div class="w-full">
                <p class="text-white font-light">"{{ $user->bio }}"</p>
            </div>
            <div class="w-full h-[2px] bg-white/50 rounded-full mt-5"></div>
            <div class=" flex items-start justify-between w-full text-white font-medium ">
                <p>Wa : {{ $user->phone }}</p>
                <p>{{ $user->address }}</p>
                <p>{{ $user->posts()->count() }} Blog Post </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('post')
    <div class="bg-gray-900 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">From the blog</h2>
        <p class="mt-2 text-lg/8 text-gray-300">Learn how to grow your business with our expert advice.</p>
        </div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-card-post :title="$post->title" :content="$post->content" :date="$post->created_at->format('d M Y')" :img="$post->user->imageProfile" :name="$post->user->name" :category="$post->category->name" :id="$post->id" :iduser="$post->user->id" :address="$post->user->address" :thumbnail="$post->thumbnail">
                {{ route('membership.detailPost', $post->id) }}

                <x-slot name="link">
                @auth
                    @if (Auth::id() === $post->user->id)
                        {{ route('membership.profilePage', $post->user->id) }}
                    @else
                        {{ route('guest.profilePage', $post->user->id) }}
                    @endif
                @endauth

                @guest
                    {{ route('guest.profilePage', $post->user->id) }}
                @endguest
               </x-slot>

                </x-card-post>
            @endforeach
        </div>
    </div>
    </div>
@endsection