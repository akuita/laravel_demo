que(),
            'email' => fake()->unique()->safeEmail,
            'password' => 'JiteraPassword@1234',
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => fake()->uni