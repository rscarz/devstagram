<?php
//para crear un controlador
//   php artisan make:controller LoginController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller
{
    //
    public function index()   {
        return view('auth.login');
    }

    public function store( Request $request){
       // dd('autenticando...');
       //dd($request->remember);


        //validaciones
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ( !auth()-> attempt($request->only('email', 'password') , $request->remember )) {
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        //redireccionar
        return redirect()->route('post.index', auth()->user()->username );

    }
}
