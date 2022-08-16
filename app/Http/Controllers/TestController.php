<?php

namespace App\Http\Controllers;

use App\Enums\BillStatusEnum;
use App\Models\Bill;

use App\Models\Pitch;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class TestController extends Controller
{
    public function test()
    {
        $a =  Pitch::query()
            ->with('bills.time')
            ->whereRelation('area','id','=',1)
            ->whereRelation('bills','status','=',BillStatusEnum::DA_DUYET)
            ->whereHas('bills')

            ->get()
            ->map(function($each){
                $start = $each->bills[0]->date_receive . ' ' . $each->bills[0]->time->time_start;
                $end = $each->bills[0]->date_receive . ' ' . $each->bills[0]->time->time_end;

                return ['title' => $each->name,
                    'start' => $start,
                    'end' => $end,
                ];
            })->toArray();


        dd($a);
        return view('test');

    }
}
