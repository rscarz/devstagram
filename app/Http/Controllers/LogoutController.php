<?php
//php artisan make:controller LogoutController 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(){
        //dd('cerrando sesion');
        auth()->logout();


        return redirect()->route('login');
    }
}
