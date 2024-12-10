<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Typelubrifiant>
 */
class TypelubrifiantFactory extends Factory
{
    use HasFactory;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(1) . ' typelub',
            'description' => fake()->sentence(2) . ' desc',
        ];
    }
}
