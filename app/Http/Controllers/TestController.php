<?php

namespace App\Http\Controllers;

use App\Models\Bill;

use App\Models\Time;



class TestController extends Controller
{
    public function test()
    {

        $a=['c'=>'1','b'=>'2'];
        $b=[];
        foreach($a as $each){
            $b[][]=$each;
        }
        dd($b);
    }
}
