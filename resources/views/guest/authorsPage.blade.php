@extends('layouts.authorsPage')

@section('title-page', 'Authors')

<x-navbar>
    
</x-navbar>

@section('searchForm')
    <x-searchingForm>Authors
        <x-slot name="link">{{ route('searchingAuthors') }}</x-slot>
    </x-searchingForm>
@endsection

@section('authors')
    @foreach ($authors as $author)
        <x-card-authors :name="$author->name" :address="$author->address" :bio="$author->bio" :imageProfile="$author->imageProfile" :postCount="$author->posts_count" :id="$author->id"></x-card-authors>
    @endforeach
@endsection