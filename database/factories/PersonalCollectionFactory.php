<?php

namespace Database\Factories;

use App\Models\PersonalCollection;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalCollectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonalCollection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'type'  => $this->faker->randomElement([PersonalCollection::TYPE_BOOK, PersonalCollection::TYPE_CD, PersonalCollection::TYPE_DVD]),
        ];
    }
}
