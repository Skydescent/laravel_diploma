<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryNames = [
            'Accessories',
            'Bags',
            'Cameras',
            'Clothing',
            'Electronics',
            'Fashion',
            'Furniture',
            'Mobile',
            'Trends',
            'More'
        ];

        $randomParentId = Category::all()->isNotEmpty() ? Category::all()->random()->id : null;

        return [
            'name' => $this->faker->randomElement($categoryNames),
            'image_id' => $this->faker->numberBetween(1,300),
            'sort_index' => $this->faker->numberBetween(0, 101),
            'is_active' => $this->faker->randomElement([true, false]),
            'parent_id' => $this->faker->randomElement([null, $randomParentId])
        ];
    }
}
