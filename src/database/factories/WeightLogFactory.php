<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::first()->id,
            'date' => $this->faker->unique()->dateTimeBetween('-2 month', 'now'),
            'weight' => $this->faker->randomFloat(1, 40, 100),
            'calorie' => $this->faker->numberBetween(1000, 3000),
            'exercise_time' => $this->faker->time('H:i'),
            'exercise_content' => $this->faker->text(),
        ];
    }
}
