<?php

namespace App\Http\Controllers;

use App\Models\Bill;

use App\Models\Time;



class TestController extends Controller
{
    public function test()
    {

        Bill::query()->where('id',100)->except('id');
    }
}
