<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    protected $model = Todo::class;

    public function definition(): array
    {
        return [
            'user_id' => rand(1, 100), // Sesuaikan dengan jumlah user
            'title' => $this->faker->sentence(),
            'is_done' => $this->faker->boolean(),
        ];
    }
}
