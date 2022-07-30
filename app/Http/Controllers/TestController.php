<?php

namespace App\Http\Controllers;

use App\Models\Bill;

use App\Models\Time;



class TestController extends Controller
{
    public function test()
    {

        $bills = Bill::query()->where('time_id', 3)
            ->where('pitch_id', 16)
            ->where('date_receive', '2022-07-24')
            ->where('status', 0)
            ->where('id', '!=', 100)->get();

    }
}
