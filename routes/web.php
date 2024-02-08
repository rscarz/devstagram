<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {  return view('principal'); });


// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', HomeController::class)->name('home');

Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
// Route::get('/login', [LogoutController::class, 'store'])->name('logout');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// Route::get('/muro', [PostController::class, 'index'])->name('post.index');

Route::post('/crear-cuenta', [RegisterController::class, 'store']);

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');


Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy'); ///eliminar publicacion
 
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
Route::get('/imagenes/eliminar', [ImagenController::class, 'eliminar'])->name('imagenes.eliminar');

//likes
Route::post('/post/{post}/like', [LikeController::class, 'store'])->name('post.like.store');
Route::delete('/post/{post}/like', [LikeController::class, 'destroy'])->name('post.like.destroy');

//perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

//seguidores
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('user.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('user.unfollow');


//variables abajo
Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
///http://127.0.0.1:8000/rosa/post/1
Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::post('/{user:username}/post/{post}', [ComentarioController::class, 'store'])->name('comentario.store'); ///store es para guardar