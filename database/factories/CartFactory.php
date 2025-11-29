<?php


namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
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
            
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Cart $cart) {
            $numberOfProducts = rand(3, 5);

            $productIds = Product::inRandomOrder()
                ->limit($numberOfProducts)
                ->pluck('id');

            foreach ($productIds as $productId) {
                $cart->products()->attach($productId, [
                    'quantity' => rand(1, 5) 
                ]);
            }
        });
    }
}
