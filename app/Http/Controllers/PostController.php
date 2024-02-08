<?php
//para crear un controlador
// php artinsa make:controller PostController
//
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //
    public function __construct()
    {
      //verifica si el usuario esta autenticado
      //except -> agrego los metodos que si va a poder ver sin estar logueado
      $this->middleware('auth')->except(['show','index' ]) ;
    } 

    public function index(User $user){
    
      //asocia el usuario al post para consultar
      //latest trae el ultimo primero
      $posts = Post::where('user_id', $user->id )->latest()->paginate(20);
      
      return view('dashboard', ['user'=>$user,
                                'posts'=>$posts]);
    }

    public function create(){
      return view('posts.create');
      
    }

    public function store(Request $request){
       $this-> validate($request, [
          'titulo' => 'required|max:255',
          'descripcion' => 'required',
          'imagen' => 'required'


       ]);

      //  Post::create([
      //   'titulo' => $request->titulo,
      //   'descripcion' => $request->descripcion,
      //   'imagen' => $request->imagen,
      //   'user_id' => auth()->user()->id,
      //  ]);

       //otra forma
      //  $post = new Post;
      //  $post->titulo = $request->titulo ;
      //  $post->descripcion = $request->descripcion ;
      //  $post->imagen = $request->imagen ;
      //  $post->user_id = auth()->user()->id;
      //  $post->save();

      //otra forma mas
      $request->user()->posts()->create([
          'titulo' => $request->titulo,
          'descripcion' => $request->descripcion,
          'imagen' => $request->imagen,
          'user_id' => auth()->user()->id,
      ]);


       return redirect()->route('post.index' , auth()->user()->username) ;
      
    }


    public function show(User $user, Post $post){
      return view('posts.show',
      [
        'post'=>$post ,
        'user'=>$user 
      ]);
      
    }

    // php artisan make:policy PostPolicy --model=Post
    public function destroy(Post $post){
      
      $this->authorize('delete', $post);
      $post->delete();

      //elimnar la imagen
      $imagen_path = public_path('uploads/' . $post->imagen);

      if (File::exists($imagen_path)){
        unlink($imagen_path);         
      }

      return redirect()->route('post.index', auth()->user()->username) ;
      
    }
    
}


