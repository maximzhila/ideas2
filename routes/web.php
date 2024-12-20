<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\UserController;
use App\Models\Comment;

Route::get('/',[ DashboardController ::class , "index"])->name('dashboard');
Route::get('/terms', function (){return view('terms');});

//не в resourse тк store поддерживает только метод get
Route::get('{idea}/comments',[ CommentController ::class , "store"])->name('ideas.comments.store')->middleware('auth');
Route::resource('ideas', ideaController::class)->except(['index','create','show'])->middleware('auth');
Route::resource('ideas', ideaController::class)->only(['show']);

Route::resource('users',UserController::class)->only(['show','edit','update'])->middleware('auth');


Route::get('/register',[ AuthController ::class , "register"])->name('register');
Route::post('/register',[ AuthController ::class , "store"]);

Route::get('/login',[ AuthController ::class , "login"])->name('login');
Route::post('/login',[ AuthController ::class , "authenticate"]);
Route::post('/logout',[ AuthController ::class , "logout"])->name('Logout');

