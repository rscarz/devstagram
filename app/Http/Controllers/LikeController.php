<?php
// php artisan make:model --migration --controller Like
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post){

        $post->like()->create([
            'user_id' => $request->user()->id
        ]);

        return back();

    }

    public function destroy(Request $request, Post $post){
        //se creo la relacion de usuario con like en el user.php
        //public function likes(){    return $this->hasMany(Like::class);  }
        //luego se relaciona user con like, y se le agrega el where + delete
       //dd('eliminando like');
       
        $request->user()->likes()->where('post_id' , $post->id)->delete(); 

       return back();

    }
}
