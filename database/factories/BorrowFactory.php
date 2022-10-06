<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reader_id'  =>$this->faker->randomDigit(),
            'books_id'  =>'4',
            'status' =>$this->faker->randomElement([ 'PENDING', 'REJECTED', 'ACCEPTED', 'RETURNED']),
            'request_processed_at' =>$this->faker->dateTime(),
            'request_managed_by' =>'2',
            'deadline'  => $this->faker->dateTime(),
            'returned_at' =>$this->faker->dateTime(),
            'return_managed_by' =>'2',
        ];
    }
}
