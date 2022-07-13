<?php

namespace App\Http\Controllers;
use App\Enums\BillStatusEnum;
use App\Enums\PitchStatusEnum;
use App\Http\Requests\Client\BookingRequest;
use App\Models\Bill;
use App\Models\Pitch;
use App\Models\Time;

use Illuminate\Http\Request;


class ClientProcessController extends Controller
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

    public function booking(Request $request, Pitch $pitch)
    {

        $date=date('Y-m-d');

        $arrCheck = [];
        $check_time = Time::query()
            ->select('time_start', 'time_end')
            ->whereIn('id', function ($q) use ($pitch,$date) {
                $q->select('time_id')
                    ->from('bills')
                    ->where('status', '=', BillStatusEnum::DA_DUYET)
                    ->where('date_receive', '=', $date)
                    ->where('pitch_id', '=', $pitch->id);

            })
            ->get()->toArray();

        foreach ($check_time as $each) {

            $arrCheck[] = $each['time_start'] . "" . $each['time_end'] ;
        }

        $time = Time::all();

        return view('user.booking', [
            'pitch' => $pitch,
            'time' => $time,
            'arrCheck' => $arrCheck
        ]);
    }

    public function pending(BookingRequest $request, Pitch $pitch)
    {

        $pitch_real = Pitch::find($pitch->id);
        $pitch_id = $pitch_real->id;
        $price = $pitch_real->price;
        $checkPitchBig = Pitch::where('pitch_id', '=', $pitch->id)->first();
        if ($checkPitchBig == null) {
            $getParents = Pitch::where('id', '=', $pitch->id)->first()->pitch_id;
            $checkExist = Bill::query()
                ->where('pitch_id', '=', $getParents)
                ->where('status', '=', BillStatusEnum::DA_DUYET)
                ->where('date_receive', '=',$request->date)
                ->where('time_id', '=', $request->selector)
                ->first();
            if ($checkExist) {
                $msg = "Sân lớn của sân này đã được người khác đặt giờ này!!";
                return redirect()->back()->with('msg', $msg);
            }
        }else if ($checkPitchBig!=null){
            $array = [];
            $getChildren = Pitch::query()
                ->where('pitch_id', '=', $pitch->id)
                ->get()->toArray();

            foreach ($getChildren as $key=> $each) {
                $array[] = $each;

            }
            $checkExist = Bill::query()->where(function ($q) use ($array) {
                foreach ($array as $key=> $child_id) {

                    $q->orWhere('pitch_id', '=', $child_id['id']);
                }
            })->where('status', '=', BillStatusEnum::DA_DUYET)
                ->where('date_receive', '=',$request->date)
                ->where('time_id', '=', $request->selector)
                ->get()->count();
            if ($checkExist) {
                $msg = "Sân nhỏ của sân này đã được người khác đặt giờ này!!";
                return redirect()->back()->with('msg', $msg);
            }
        }


        Bill::create([
            'email_receive' => $request->email,
            'name_receive' => $request->name_receive,
            'phone_receive' => $request->phone,
            'date_receive' => $request->date,
            'time_id' => $request->selector,
            'price' => $price,
            'pitch_id' => $pitch_id
        ]);
        return redirect()->route('index');


    }


}
