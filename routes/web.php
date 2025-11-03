<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('homepage');
Route::get('/membership/homepage', [PostController::class, 'indexMembership'])->name('membership.homepage');
Route::get('/membership/profile', [PostController::class, 'postsMember'])->name('membership.posts');
Route::get('/membership/post/{id}', [PostController::class, 'detailPost'])->name('membership.detailPost');