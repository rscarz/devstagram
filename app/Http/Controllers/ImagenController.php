<?php

//php artisan make:controller ImagenController

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
 

class ImagenController extends Controller
{
    public function store( Request $request ) {
        //return "Desde Image Controller" ; 
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() . "." . $imagen->extension() ;

        $imagenServidor =  Image::make($imagen) ;
        $imagenServidor -> fit(1000, 1000) ;

        $imagenPath = public_path('uploads') . '/' . $nombreImagen ;

        $imagenServidor -> save($imagenPath) ;
        
       // $input = $request->all();

        return response()->json( ['imagen' => $nombreImagen]); 
    }

    public function eliminar()
    {
        $imagenes = glob(public_path('uploads') . '/*');
        $imagenesBaseDatos = \App\Models\Post::pluck('imagen')->toArray();

        dd('$imagenes');
 
        foreach ($imagenes as $imagen) {
            if (!in_array(basename($imagen), $imagenesBaseDatos)) {
                unlink($imagen);
            }
        }
 
        return response()->json(['mensaje' => 'Imagenes eliminadas']);
    }
}
