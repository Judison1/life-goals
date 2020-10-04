<?php

namespace Database\Factories;

use App\Models\Attachment;
use App\Models\Card;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_path' => $this->faker->url,
            'attachable_id' => Card::factory(),
            'attachable_type' => Card::class,
        ];
    }
}
