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
        $id_pitch = $request->id;
        $date_receive = $request->val;


        $arrCheck = [];
        $check_time = Time::query()
            ->select('time_start', 'time_end')
            ->whereHas('bills', function ($q) use ($id_pitch, $date_receive) {
                $q->where('status', '=', BillStatusEnum::DA_DUYET)
                    ->where('date_receive', '=', $date_receive)
                    ->where('pitch_id', '=', $id_pitch);

            })
            ->get()->toArray();
        foreach ($check_time as $each) {
            $arrCheck[] = $each['time_start'] . $each['time_end'];
        }
        $checkPitchBig = Pitch::where('pitch_id', '=', $id_pitch)->first();
        if ($checkPitchBig == null) {
            $getParents = Pitch::query()
                ->where('id', '=', $id_pitch)
                ->first()
                ->pitch_id;
            $checkExist = Time::query()
                ->select('time_start', 'time_end')
                ->whereHas('bills', function ($q) use ($date_receive, $getParents) {
                    $q->where('pitch_id', '=', $getParents)
                        ->where('status', '=', BillStatusEnum::DA_DUYET)
                        ->where('date_receive', '=', $date_receive);


                })->get()->toArray();

            if (count($checkExist) >= 1) {
                foreach ($checkExist as $each) {
                    if (!in_array($each['time_start'] . $each['time_end'], $arrCheck, true)) {
                        array_push($arrCheck, $each['time_start'] . $each['time_end']);
                    }
                }
            }
        } else if ($checkPitchBig != null) {
            $array = [];
            $getChildren = Pitch::query()
                ->where('pitch_id', '=', $id_pitch)
                ->get()->toArray();

            foreach ($getChildren as $each) {
                $array[] = $each;

            }
            $checkExist = Bill::query()->with('time:id,time_start,time_end')
                ->where(function ($q) use ($array) {
                    foreach ($array as $child_id) {

                        $q->orWhere('pitch_id', '=', $child_id['id']);
                    }
                })->where('status', '=', BillStatusEnum::DA_DUYET)
                ->where('date_receive', '=', $date_receive)
                ->get()->toArray();

            if (count($checkExist) >= 1) {
                foreach ($checkExist as $each) {
                    if (!in_array($each, $arrCheck, true)) {
                        array_push($arrCheck, $each['time']['time_start'] . $each['time']['time_end']);
                    }

                }
            }
        }


        $arrGetTime = [];
        $time = Time::all();
        foreach ($time as $each) {
            if (time() + 60 * 60 > strtotime($date_receive . ' ' . $each->time_start)) {
                $arrGetTime[] = $each['time_start'] . $each['time_end'];
            }
        }

        return response()->json([
            'success' => true,
            'data' => $time,
            'arrCheck' => $arrCheck,
            'arrGetTime' => $arrGetTime,
        ]);
    }

    public function getPitchesByArea(Request $request)
    {
        try {
            $pitches = Pitch::query()
                ->where('area_id', $request->id)->get();
            return response()->json([
                'success' => true,
                'pitches' => $pitches,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

    }

    public function getDataForArea(Request $request)
    {
        try {

            $data =    Pitch::query()
                ->with('bills.time')
                ->whereRelation('area','id','=',$request->id)
                ->whereRelation('bills','status','=',BillStatusEnum::DA_DUYET)
                ->whereHas('bills')

                ->get()
                ->map(function($each){
                    $start = $each->bills[0]->date_receive . ' ' . $each->bills[0]->time->time_start;
                    $end = $each->bills[0]->date_receive . ' ' . $each->bills[0]->time->time_end;

                    return ['title' => 'Sân '.$each->name,
                        'start' => $start,
                        'end' => $end,
                    ];
                });
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

    }

}
