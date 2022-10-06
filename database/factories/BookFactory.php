<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'  =>$this->faker->sentence(),
            'authors'  =>$this->faker->name(),
            'description' =>$this->faker->optional()->sentence(),
            'released_at' =>$this->faker->dateTime(),
            'cover_image' =>$this->faker->optional()->imageurl(),
            'pages'  => $this->faker->randomNumber(4),
            'language_code' =>$this->faker->word(3),
            'isbn' =>$this->faker->regexify('/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i'),
            'in_stock'  => $this->faker->randomDigit(),
        ];
    }
}
