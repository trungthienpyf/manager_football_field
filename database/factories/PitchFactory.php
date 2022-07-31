<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Pitch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PitchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween( 100000 , 900000 ) ,
            'img' => $this->faker->imageUrl(),
            'status' => 0,
            'size' => 2,
            'area_id' => Area::query()->inRandomOrder()->value('id'),

        ];
    }
}
