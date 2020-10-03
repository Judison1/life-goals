<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\CardList;

use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'rank' => $this->faker->unique()->randomNumber,
            'card_list_id' => CardList::factory(),
        ];
    }
}
