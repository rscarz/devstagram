<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\returnSelf;

class PerfilController extends Controller
{
    //este se agrega para que no se pueda ver si no esta logueado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
       return view('perfil.index');
    }


    public function store(Request $request){

        //modificar el request
        $request->request->add(['username' => Str::slug( $request->username )]);
        
         $this->validate($request , 
         [
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20', 'not_in:twitter,editar-perfil'] 
         ]);

         if ($request->imagen){
            
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension() ;

            $imagenServidor =  Image::make($imagen) ;
            $imagenServidor -> fit(1000, 1000) ;

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen ;

            $imagenServidor -> save($imagenPath) ;
 
         }

         //guardar cambios
         $usuario = User::find(auth()->user()->id);
         $usuario->username = $request->username;
         $usuario->imagen = $nombreImagen ?? '' ;
         $usuario->save();

         //redireccionar
         return redirect()->route('post.index' , $usuario->username);
     }
}
