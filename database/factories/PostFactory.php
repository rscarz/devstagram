<?php
//php artisan tinker
//App\Models\Post::factory()
//Post::factory->times(200)->create();
//App\Models\Post::factory()->times(200)->create();
//php artisan migrate:rollback --step=1

//php artisan migrate:rollback --step=1         para revertir
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(5) , //libreria
            'descripcion' =>  $this->faker->sentence(20) ,
            'imagen' =>  $this->faker->uuid() . '.jpg' ,
            'user_id' =>  $this->faker->randomElement([1,2])

        ];
    }
}
