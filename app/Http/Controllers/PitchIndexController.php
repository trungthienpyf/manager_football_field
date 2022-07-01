<?php

namespace App\Http\Controllers;

use App\Enums\PitchStatusEnum;
use App\Models\Area;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Pitch;
use Carbon\Carbon;
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

    public function detail_pitch(request $request, Pitch $pitch)
    {

        return view('user.detail_pitch', ['pitch' => $pitch]);
    }

    public function booking(request $request, Pitch $pitch)
    {
        return view('user.booking', [
            'pitch' => $pitch
        ]);
    }

    public function pending(request $request, Pitch $pitch)
    {

        $pitch_real = Pitch::find($pitch->id);
        $pitch_id = $pitch_real->id;
        $price = $pitch_real->price;
        $time_start = Carbon::parse($request->time_start)->toDateTimeString();
        $time_end= Carbon::parse($request->time_end)->toDateTimeString();

        Bill::create([
            'email_receive'=>$request->email,
            'name_receive'=>$request->name_receive,
            'phone_receive'=>$request->phone,
            'time_start'=>$time_start,
            'time_end'=>$time_end,
            'price'=>$price,
            'pitch_id' =>$pitch_id
        ]);
        return redirect()->route('index');
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
        })->has('pitch', '<', 4)->orderBy('created_at', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $get_size_11,
        ]);
    }
}
