<?php
//php artisan make:model --migration --factory Post 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo' ,
        'descripcion' ,
        'imagen' ,
        'user_id'  
    ];


    public function user(){
       // return $this->belongsTo(User::class);
        return $this->belongsTo(User::class)->select('name', 'username');
    }

    public function comentario(){
        // return $this->belongsTo(User::class);
         return $this->hasMany(Comentario::class);
     }

     public function like(){
        // return $this->belongsTo(User::class);
         return $this->hasMany(Like::class);
     }

     //verifico si ua se le dio like
     //se posiciona en la tabla de likes, y mira si en la columna user id, ya tiene ese valor de id
     public function checkLike(User $user)  {
        return $this->like->contains('user_id' , $user->id);
        
     }
}
