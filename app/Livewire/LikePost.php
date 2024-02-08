<?php
// php artisan make:livewire like-post
namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post   ;
    public $isLiked ;
    public $likes;

    public function mount ($post ){

        $this->isLiked =  $post->checkLike( auth()->user() ) ;
        $this->likes = $post->like->count() ;
    }

    public function render()
    {
        return view('livewire.like-post');
    }

    public function like()  {
        //si el usuario ya le dio me gusta
        if ( $this->post->checkLike( auth()->user() ) ) {

             $this->post->like()->where('post_id' ,  $this->post->id)->delete(); 

             $this->isLiked = False;
             $this->likes--;
   
        } else
        {
            $this->post->like()->create([
                'user_id' => auth()->user()->id
            ]);

            $this->isLiked = true;
            $this->likes++;
        }
    }
}
