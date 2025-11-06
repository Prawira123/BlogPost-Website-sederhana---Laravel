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
      <h2 class="mb-4 text-4xl font-bold text-gray-900 dark:text-white">Edit Your Profile</h2>
      <form action="{{ route('user.update') }}" method="POST">
        @csrf
        @method('PUT')
          <div class="flex flex-col gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                  <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name..."  value="{{ $user->name}}">
                  @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="w-full">
                  <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image Profile Link</label>
                  <input type="text" name="imageProfile" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="your image Profile"  value="{{ $user->imageProfile}}">
                  @error('imageProfile')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="w-full">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                  <input type="number" name="phone" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="+62...." value="{{ $user->phone}}">
                  @error('phone')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="w-full">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                  <input type="text" name="address" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="from..."  value="{{ $user->address }}">
                  @error('address')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div> 
              <div class="sm:col-span-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                  <textarea name="bio" id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="describe yourself here" value="{{ $user->bio }}"></textarea>
                  @error('bio')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>
          </div>
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-gray-800 bg-white rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-400 cursor-pointer">
              Update Profile
          </button>
      </form>
  </div>
</section>
@endsection