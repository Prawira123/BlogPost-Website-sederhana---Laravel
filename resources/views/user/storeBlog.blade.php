@extends('layouts.form')

@section('title-page', 'EditForm')

@if (session('success'))
    <div class="mb-4 p-3 text-green-700 bg-green-100 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@section('form')

<section class="bg-white dark:bg-gray-900">

<a href="{{ route('membership.profilePage') }}" class="ml-20 mt-20">
    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-gray-800 bg-white rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-400 cursor-pointer">
        Back
    </button>
</a>
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-4xl font-bold text-gray-900 dark:text-white">Make a Blog</h2>
      <form action="{{ route('post.store') }}" method="POST">
        @csrf
          <div class="flex flex-col gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                  <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type title..."  value="{{ old('title') }}">
                  @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="w-full">
                  <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail Image</label>
                  <input type="text" name="thumbnail" id="thumbnail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="your image Profile"  value="{{ old('thumbnail') }}">
                  @error('thumbnail')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div>
                  <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                  <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                      <option selected="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach                   
                    </select>
                  @error('category')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="sm:col-span-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                  <textarea name="content" id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="describe yourself here" value="{{ old('content') }}"></textarea>
                  @error('content')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
          </div>
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-gray-800 bg-white rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-400 cursor-pointer">
              Add Blog
          </button>
      </form>
  </div>
</section>
@endsection