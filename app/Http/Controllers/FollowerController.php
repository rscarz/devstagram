<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //linea para solo poder usar si esta autenticado
    public function __construct() {
        $this->middleware('auth');  
    }

    public function store(User $user ){
        // $user es la persona que estamos siguiendo
        // $request tiene a la persona que va a seguir
        $user->followers()->attach( auth()->user()->id);

        return back() ;
    }

    public function destroy(User $user ){
        // $user es la persona que estamos siguiendo
        // $request tiene a la persona que va a seguir
        $user->followers()->detach( auth()->user()->id);

        return back() ;
    }
}
