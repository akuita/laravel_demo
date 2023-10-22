<?php

namespace Database\Factories;

use App\Models\Abc;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbcFactory extends Factory
{
    protected $model = Abc::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
