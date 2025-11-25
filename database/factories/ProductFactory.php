<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->words(2, true) . ' Cookie',
            'type' => $this->faker->randomElement(['cookies', 'brownies', 'cake']),
            'price' => $this->faker->randomFloat(2, 1, 50),
            'ingredients' => $this->faker->randomElements(
                ['flour', 'sugar', 'butter', 'eggs', 'vanilla', 'chocolate', 'baking soda', 'salt'],
                $this->faker->numberBetween(3, 6)
            ),
        ];
    }
}
