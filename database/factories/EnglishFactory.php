<?php

namespace Database\Factories;

use App\Models\English;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnglishFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = English::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sura' => $this->faker->randomDigitNotNull,
        'aya' => $this->faker->randomDigitNotNull,
        'text' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
