<?php

namespace Database\Factories;

use App\Models\Professor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'fullname' => $this->faker->name,
            'age' => $this->faker->numberBetween(25, 70),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => function (array $attributes) {
                return User::find($attributes['user_id'])->email;
            },
        ];
    }
}