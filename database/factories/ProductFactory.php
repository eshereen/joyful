<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' =>$this->faker->word,
            'description' =>$this->faker->paragraphs(5),
            'price' =>$this->faker-> randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 400) ,
            'size_id'=>1
        ];
    }
}
