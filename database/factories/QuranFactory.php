<?php

namespace Database\Factories;

use App\Models\Quran;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sura' => $this->faker->randomDigitNotNull,
        'verse' => $this->faker->randomDigitNotNull,
        'ayaht' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
