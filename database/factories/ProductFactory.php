<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id = (User::where('email', 'demo@myexpenses.ovh')->first())->id;
        $category_id = (Category::where('user_id', $user_id)->inRandomOrder()->first())->id;

        return [
            'name' => $this->faker->word,
            'category_id' => $category_id,
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'comment' => '',
            'bought_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
            'user_id' => $user_id
        ];
    }
}
