<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            'boné','calça','jaqueta','tenis','camseta','chinelo',
            'Bermuda','chapéu','bicicleta','skate',
        ];
        return [
            'name' => $this->faker->randomElement($names),
            'price' => $this->faker->randomFloat(2, 1, 5000),
            'quantily' => $this->faker->numberBetween(1, 10000),

        ];
    }
}
