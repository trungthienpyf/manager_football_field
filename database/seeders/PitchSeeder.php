<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Pitch;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PitchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startMorning = Carbon::createFromTime(07);
        $endMorning = $startMorning->copy()->addHours(3);

        $startEvening = Carbon::createFromTime(16);
        $endEvening = $startEvening->copy()->addHours(5);
        $arrMorning = [];
        $arrEvening = [];
        for (; $startMorning <= $endMorning; $startMorning->addMinutes(60)) {
            $arrMorning[] = [
                'time_start' => $startMorning->format('H:i:s'),
                'time_end' => $startMorning->copy()->addHours()->format('H:i:s'),
            ];
        }
        for (; $startEvening <= $endEvening; $startEvening->addMinutes(60)) {
            $arrEvening[] = [
                'time_start' => $startEvening->format('H:i:s'),
                'time_end' => $startEvening->copy()->addHours()->format('H:i:s'),
            ];
        }
        Time::insert($arrMorning);
        Time::insert($arrEvening);


        $faker = \Faker\Factory::create();
//        $area = Company::query()->pluck('id')->toArray();

        for ($i = 1; $i <= 400; $i++) {

            $pitch_id = Pitch::query()->inRandomOrder()->where('size', 2)->value('id');
            $check_id = Pitch::query()
                ->where('pitch_id', '=', $pitch_id)
                ->get();

            if (count($check_id) >= 3) {
                $pitch_id = Pitch::query()->inRandomOrder()->where('id', '!=', $pitch_id)->value('id');
            }

            $area_id = Pitch::query()->where('id', $pitch_id)->value('area_id');

            Pitch::insert([
                'name' => $faker->name,
                'price' => $faker->numberBetween(100000, 900000),
                'img' => $faker->imageUrl(),
                'status' => 0,
                'size' => 1,
                'pitch_id' => $pitch_id,
                'area_id' => $area_id,
            ]);
        }
    }
}
