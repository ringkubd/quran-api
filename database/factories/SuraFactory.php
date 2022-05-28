<?php

namespace Database\Factories;

use App\Models\Sura;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sura_no' => $this->faker->randomDigitNotNull,
        'sura_name' => $this->faker->word,
        'para' => $this->faker->randomDigitNotNull,
        'meaning' => $this->faker->word,
        'total_ayat' => $this->faker->randomDigitNotNull,
        'total_ruku' => $this->faker->randomDigitNotNull,
        'eng_name' => $this->faker->word,
        'hindi' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
