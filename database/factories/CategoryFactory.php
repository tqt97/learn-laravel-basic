<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->words(2, true);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'order_at' => 1,
            'parent_id' => null,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
