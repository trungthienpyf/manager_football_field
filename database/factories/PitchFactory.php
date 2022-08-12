<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Pitch;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
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
        $path = public_path('storage/images/');
        $files = \File::files($path);
        $arrNameFiles=[];

        foreach($files as $path) {
            $file = pathinfo($path);
           $arrNameFiles[]= $file['basename'] ;
        }
        $randomFile = $arrNameFiles[array_rand($arrNameFiles)];

        return [
            'name' =>  $this->faker->middleName . ' '. $this->faker->lastName,
            'price' => $this->faker->numberBetween( 100000 , 900000 ) ,
            'img' => 'images/'.$randomFile,
            'status' => 0,
            'size' => 2,
            'area_id' => Area::query()->inRandomOrder()->value('id'),

        ];
    }
}
