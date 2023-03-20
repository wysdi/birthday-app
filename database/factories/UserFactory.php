<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=> fake()->uuid(),
            'email'=> fake()->email(),
            'first_name' => fake()->firstName(),
            'last_name' =>  fake()->lastName(),
            'location'=> 'Asia/Jakarta',
            'birthday'=> fake()->date

        ];
    }


}
