<?php

namespace Database\Factories;

use App\Models\Tafsir;
use Illuminate\Database\Eloquent\Factories\Factory;

class TafsirFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tafsir::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'content' => $this->faker->text,
        'sura' => $this->faker->randomDigitNotNull,
        'ayat' => $this->faker->randomDigitNotNull,
        'source' => $this->faker->word,
        'tags' => $this->faker->word,
        'blog' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
