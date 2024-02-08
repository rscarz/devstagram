<?php
// php artisan make:controller HomeController

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        //verifica si el usuario esta autenticado
        //except -> agrego los metodos que si va a poder ver sin estar logueado
        $this->middleware('auth')->except(['show','index' ]) ;
    } 

    //metodo invoke se llama automaticamente
    public function  __invoke()
    {
        //obtener  a quienes seguimos
        // pluck para traer solo ciertos datos
        $ids =  auth()->user()->followings->pluck('id')->toArray() ;
        //where IN se usa con arreglos
        $posts = Post::whereIn('user_id' , $ids)->latest()->paginate(20);



        return view ('home' , 
        [
            'posts' => $posts
        ]) ;
    }  
}
