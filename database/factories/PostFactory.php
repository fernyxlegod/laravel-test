<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'=>$this->faker->randomElement(User::all()),
            'title'=>$this->faker->word(),
            'text'=>$this->faker->text()
        ];
    }
}
