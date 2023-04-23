<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Models\Chatroom;
use App\Http\Controllers\CharacterController;



Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/chatroom', [ChatroomController::class, 'chat'])->name('chat');
Route::post('/chatroom', [ChatroomController::class, 'store'])->name('chatroom.store');

Route::get('/register', function () {
    return view('register');
});

Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::post('/register', 'App\Http\Controllers\RegisterController@store')->name('register.store');

Route::post('/', function () {
});// routes/web.php

Route::post('/password/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');

Route::post('/chatroom/like/{id}', [App\Http\Controllers\ChatroomController::class, 'like'])->name('chatroom.like');
Route::post('/like/{id}', [ChatroomController::class, 'like'])->name('chatroom.like');

Route::get('/character_index', [CharacterController::class, 'index'])->name('character');
Route::get('/characters/create', [CharacterController::class, 'create'])->name('characters.create');

Route::get('/character', [CharacterController::class, 'index'])->name('character.index');



Route::get('/chatroom', [ChatroomController::class, 'chatroom'])->name('chatroom');
