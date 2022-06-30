<?php

namespace App\Http\Controllers;

use App\Enums\PitchStatusEnum;
use App\Models\Area;
use App\Models\Customer;
use App\Models\Pitch;
use Illuminate\Http\Request;

class PitchIndexController extends Controller
{
    public function index()
    {
        $pitches = Pitch::query()->paginate(20);


        $status = PitchStatusEnum::getArrayView();
        date_default_timezone_set('Asia/Ho_Chi_Minh');


        return view('user.welcome', [
            'pitches' => $pitches,
            'status' => $status
        ]);
    }

    public function detail_pitch(request $request,Pitch $pitch)
    {

        return view('user.detail_pitch',['pitch'=>$pitch]);
    }

    public function addToCard(request $request,Pitch $pitch)
    {
        return view('user.checkout',[
            'pitch'=>$pitch
        ]);
    }

    public function getSize11()
    {
        $get_size_11 = Pitch::query()
            ->where('size', '=', '2')
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json([
            'success' => true,
            'data' => $get_size_11,
        ]);
    }

    public function returnValueArea(Request $request)
    {
        $area_id = $request->val;
        $get_size_11 = Pitch::whereHas('area', function ($q) use ($area_id) {
            $q->where('area_id', '=', $area_id)
                ->where('size', '=', 2);
        })->has('pitch','<',4) ->orderBy('created_at','DESC')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $get_size_11,
        ]);
    }
}
