<?php

namespace Database\Factories;

use App\Models\Podcast;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'info' => $this->faker->text,
            'length'=>$this->faker->numberBetween(10, 120) . "minutes",
            'released' => $this->faker->dateTime(),
            'creator' => $this->faker->name,
        ];
    }
}
