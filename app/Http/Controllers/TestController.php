<?php

namespace App\Http\Controllers;

use App\Models\Bill;

use App\Models\Time;



class TestController extends Controller
{
    public function test()
    {

        $from = date('2018-01-01');
        $to = date('2023-05-02');

        $test=Bill::whereBetween('date_receive', [$from, $to])->dd();
        dd($test);
    }
}
