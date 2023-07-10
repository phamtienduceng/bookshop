<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(['Pending', 'Processing', 'Completed', 'Cancelled']),
            'payment_method' => $this->faker->randomElement(['Card', 'Cash']),
            'order_total' => $this->faker->randomFloat(2, 20, 200),
        ];
    }
}
