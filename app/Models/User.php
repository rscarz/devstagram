<?php
//php artisan tinker
//$usuario = User::find(1)

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    //los seguidores del usuario
    public function followers(){
        //se pasa el usuario, la tabla, la relacion, el campo
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    //almacena los que seguimos
    public function followings(){
        //se pasa el usuario, la tabla, la relacion, el campo
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    //comprobar si el usuario ya sigue a otro
    public function siguiendo(User $user)  {
        return $this->followers->contains($user->id);
    }

    //los usuaruis a quien seguimos
}
