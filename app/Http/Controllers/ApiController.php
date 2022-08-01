<?php

namespace App\Http\Controllers;
use App\Enums\BillStatusEnum;
use App\Enums\PitchStatusEnum;
use App\Http\Requests\Client\BookingRequest;
use App\Models\Bill;
use App\Models\Pitch;
use App\Models\Time;

use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function returnValueArea(Request $request)
    {
        $area_id = $request->val;

        $get_size_11 = Pitch::whereHas('area', function ($q) use ($area_id) {
            $q->where('area_id', '=', $area_id)
                ->where('size', '=', 2);
        })->has('pitches', '<', 4)->orderBy('created_at', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $get_size_11,
        ]);
    }

    public function checkTimeApi(Request $request)
    {
        $id_pitch=$request->id;
        $date_receive=$request->val;

        $time = Time::all();

        $arrCheck = [];
        $check_time = Time::query()
            ->select('time_start', 'time_end')
            ->whereIn('id', function ($q) use ($id_pitch,$date_receive) {
                $q->select('time_id')
                    ->from('bills')
                    ->where('status', '=', BillStatusEnum::DA_DUYET)
                    ->where('date_receive', '=',$date_receive)
                    ->where('pitch_id', '=', $id_pitch);

            })
            ->get()->toArray();
        foreach ($check_time as $each) {
            $arrCheck[] = $each['time_start']  . $each['time_end'] ;
        }
        $arrGetTime=[];
        foreach ($time as $each) {
            if (time() > strtotime( $date_receive.' '. $each->time_start)) {
                $arrGetTime[] = $each['time_start']  . $each['time_end'] ;
            }
        }

        return response()->json([
            'success' => true,
            'data' => $time,
            'arrCheck' => $arrCheck,
            'arrGetTime' => $arrGetTime,
        ]);
    }
    public function getPitchesByArea(Request $request){
        try {
            $pitches =Pitch::query()
                ->where('area_id',$request->id)->get();
            return response()->json([
                'success' => true,
                'pitches' => $pitches,
            ]);
        }catch (\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

    }

}
