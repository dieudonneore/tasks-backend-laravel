<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *
     * @return array
     */
    protected $model = News::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'content' => $this->faker->text,
            'user_id' => 1
        ];
    }
}
