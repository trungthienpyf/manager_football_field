<?php

namespace App\Http\Controllers;

use App\Enums\BillStatusEnum;
use App\Models\Bill;

use App\Models\Pitch;
use App\Models\Time;
use Carbon\Carbon;


class TestController extends Controller
{
        public function test()
        {
            $arrCheck=[];
            $checkPitchBig = Pitch::where('pitch_id', '=', 184)->first();
            if ($checkPitchBig == null) {
                $getParents = Pitch::query()

                    ->where('id', '=', 184)
                    ->first()
                    ->pitch_id;
                $checkExist = Time::query()
                    ->select('time_start', 'time_end')
                    ->whereHas('bills', function ($q) use ($getParents) {
                        $q ->where('pitch_id', '=', $getParents)
                            ->where('status', '=', BillStatusEnum::DA_DUYET)
                            ->where('date_receive', '=','2022-08-12');


                    })->get()->toArray();

                if (count($checkExist)>=1) {
                    foreach ($checkExist as $each) {
                        if(!in_array($each['time_start']  . $each['time_end'], $arrCheck, true)){
                            array_push( $arrCheck,$each['time_start']  . $each['time_end']);
                        }
                    }
                }
            } dd($arrCheck);

        }
}
