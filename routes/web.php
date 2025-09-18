<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts', [PostController::class,'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class,'create'])->name("posts.create");
// Route::post('/posts', [PostController::class,'store'])->name("posts.store");
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');

// Route::prefix('/posts/')->name('posts.')->group(function(){
//     Route::controller(PostController::class)->group(function(){
//         Route::get('', 'index')->name('index');
//         Route::get('create', 'create')->name("create");
//         Route::post('', 'store')->name("store");
//         Route::get('{post}/edit',  'edit')->name('edit');
//         Route::put('{post}/update',  'update')->name('update');
//         Route::delete('{post}/destroy',  'destroy')->name('destroy');
//     });
// });

Route::get('/user', function(){
    echo "rota web /user";
});

Route::resource('/posts', PostController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'formLogin'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');



