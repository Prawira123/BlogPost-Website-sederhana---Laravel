<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CommentController;

Route::get('/', [PostController::class, 'index'])->name('homepage');

Route::get('/homepage/post/{id}', [GuestController::class, 'detailPostGuest'])->name('guest.detailPost');
Route::get('/profilePage/{id}', [GuestController::class, 'detailProfile'])->name('guest.profilePage');

Route::get('/searchingPost', [PostController::class, 'searchingPost'])->name('searchingPost');
Route::get('/searchingAuthors', [PostController::class, 'searchingAuthor'])->name('searchingAuthors');


Route::middleware('auth')->group(function () {
    Route::get('/membership/homepage', [UserController::class, 'indexMembership'])->name('membership.homepage');
    Route::get('/membership/profile', [UserController::class, 'detail'])->name('membership.profilePage');
    Route::get('/membership/post/{id}', [PostController::class, 'detailPost'])->name('membership.detailPost');
    Route::post('/membership/post/{post}/comments', [CommentController::class, 'store'])->name('membership.comment.store');
    Route::get('/membership/profilePage/edit', [UserController::class,'edit'])->name('user.edit');
    Route::put('/membership/profilePage', [UserController::class, 'update'])->name('user.update');
    Route::get('/membership/addBlog', [PostController::class, 'addBlog'])->name('membership.addBlog');
    Route::post('/membership/storeBlog', [PostController::class, 'store'])->name('post.store');
    Route::get('/membership/editBlog/{id}', [PostController::class, 'edit'])->name('membership.editBlog');
    Route::put('/membership/updateBlog/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/membership/deleteBlog/{id}', [PostController::class, 'delete'])->name('post.delete');
    Route::get('/membership/authors', [UserController::class, 'index'])->name('membership.authorsPage');
    Route::get('membership/searchingPost', [UserController::class, 'searchingPost'])->name('searchingPost');
    Route::get('membership/searchingAuthors', [UserController::class, 'searchingAuthor'])->name('searchingAuthors');
});