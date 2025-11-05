<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [PostController::class, 'index'])->name('homepage');
Route::get('/membership/homepage', [PostController::class, 'indexMembership'])->name('membership.homepage');
Route::get('/membership/profile', [PostController::class, 'postsMember'])->name('membership.posts');
Route::get('/membership/post/{id}', [PostController::class, 'detailPost'])->name('membership.detailPost');
Route::get('/homepage/post/{id}', [PostController::class, 'detailPostGuest'])->name('membership.detailPost');
Route::post('/membership/post/{post}/comments', [CommentController::class, 'store'])->middleware('auth')->name('membership.comment.store');

// Route::get('/login' , function(){
//     return view('auth.login');
// })->name('loginPage');