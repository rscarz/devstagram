<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;


class RegisterController extends Controller
{
    public function index() 
    {  
        return view('auth.register');
    }

    public function store(Request $request) 
    {  
        // dd($request);

        // dd()
        $request->request->add(['username' => Str::slug( $request->username )]);


        //validaciones
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|max:20|unique:users|min:3',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:1'

        ]);

       // dd('Creando usuario');

        User ::create([
            'name' => $request->name ,
            'username' => $request->username ,
            'email' => $request->email ,
            'password' => $request->password  
        ]);

        //autenticar usuario
        //auth()-> attempt(['email' =>  $request->email, 'password' =>  $request->password]) ;

        //otra forma
        auth()-> attempt($request->only('email', 'password')) ;

        //redireccionar
        return redirect()->route('post.create');

        
    }
}