<?php

namespace App\Http\Controllers;

use App\Enums\BillStatusEnum;
use App\Models\Bill;

use App\Models\Pitch;
use App\Models\Time;



class TestController extends Controller
{
    public function test()
    {




        $pitch_id= Pitch::query()->inRandomOrder()->value('id');
        $check_id=Pitch::query()
            ->where('pitch_id','=',$pitch_id)
            ->get();
        $pitch_id_other= Pitch::query()->inRandomOrder()->where('id','!=',$pitch_id)->value('id');




    }
}
