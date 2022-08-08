<?php

namespace App\Http\Controllers;

use App\Enums\BillStatusEnum;
use App\Enums\PitchStatusEnum;
use App\Http\Requests\Client\BookingRequest;
use App\Models\Area;
use App\Models\Bill;
use App\Models\Pitch;
use App\Models\Time;

use Illuminate\Http\Request;


class ClientProcessController extends Controller
{
    public function index(Request $request)
    {
        $area = Area::get();

        $q = Pitch::query()->orderByDesc('created_at');

        $area_id = $request->area_id;
        if (!empty($area_id)) {

            $q->where('area_id', $area_id);

        }

        $date_search = $request->date_search;
        $time_start = $request->time_start;
        $time_end = $request->time_end;

        if (!empty($date_search)) {
            if (empty($time_start)) {
                $q->whereNotIn('id', function ($q) use ($date_search) {
                    $q->select('id')
                        ->from('bills')
                        ->where('status', '=', BillStatusEnum::DA_DUYET)
                        ->where('date_receive', $date_search);
                });
            } else {
                $q->whereNotIn('id', function ($q) use ($date_search, $time_start, $time_end) {
                    $q->select('pitch_id')
                        ->from('bills')
                        ->where('status', '=', BillStatusEnum::DA_DUYET)
                        ->whereBetween('expected_time', [$date_search . ' ' . $time_start, $date_search . ' ' . $time_end]);
                });

                    $check_parents = Bill::query()
                        ->select('pitch_id')
                        ->where('status', '=', BillStatusEnum::DA_DUYET)
                        ->whereBetween('expected_time', [$date_search . ' ' . $time_start, $date_search . ' ' . $time_end])
                        ->get()
                        ->toArray();

                if ($check_parents) {
                        $querySelectChildren = Pitch::query()
                            ->select('id')
                            ->orWhere(function ($query) use ($check_parents) {
                                foreach ($check_parents as $check) {

                                    $query->orWhere('pitch_id', $check);
                                }
                            })
                            ->get()->toArray();

                        $querySelectParent = Pitch::query()
                            ->select('pitch_id')
                            ->orWhere(function ($query) use ($check_parents) {
                                foreach ($check_parents as $check) {

                                    $query->orWhere('id', $check);
                                }
                            })->distinct()->get()->toArray();

                        $arrGetParent = [];

                        foreach ($querySelectParent as $getHasValue) {

                            $arrGetParent = array_filter($getHasValue);
                        }

                    $q->where(function ($q) use ($arrGetParent) {
                        foreach ($arrGetParent as $check) {
                            $q->where('id', '!=', $check);
                        }
                    });
                    $q->where(function ($q) use ($querySelectChildren) {
                        foreach ($querySelectChildren as $check) {
                            $q->where('id', '!=', $check);
                        }
                    });
                }

            }
        }


        $search = $request->search;
        if (!empty($search)) {
            $q->where('name', 'like', '%' . $search . '%');
        }

        $pitches = $q->latest()->paginate(20);

        $status = PitchStatusEnum::getArrayView();
        date_default_timezone_set('Asia/Ho_Chi_Minh');


        return view('user.welcome', [
            'pitches' => $pitches,
            'status' => $status,
            'area' => $area,
            'area_id' => $area_id,
            'dateSearch' => $date_search,
            'timeStartSearch' => $time_start,
            'timeEndSearch' => $time_end,
        ]);
    }

    public function detail_pitch(request $request, Pitch $pitch)
    {

        return view('user.detail_pitch', ['pitch' => $pitch]);
    }

    public function booking(Request $request, Pitch $pitch)
    {
        $dateSearch = '';
        $timeStartSearch = '';
        $timeEndSearch = '';

        if ($request->dateSearch) {
            $dateSearch = $request->dateSearch;
        }
        if ($request->timeStartSearch) {
            $timeStartSearch = $request->timeStartSearch;
        }
        if ($request->timeEndSearch) {
            $timeEndSearch = $request->timeEndSearch;
        }

        $date = date('Y-m-d');

        $arrCheck = [];
        $check_time = Time::query()
            ->select('time_start', 'time_end')
            ->whereIn('id', function ($q) use ($pitch, $date) {
                $q->select('time_id')
                    ->from('bills')
                    ->where('status', '=', BillStatusEnum::DA_DUYET)
                    ->where('date_receive', '=', $date)
                    ->where('pitch_id', '=', $pitch->id);

            })
            ->get()->toArray();

        foreach ($check_time as $each) {

            $arrCheck[] = $each['time_start'] . "" . $each['time_end'];
        }

        $time = Time::all();
        $arrGetTime = [];

        foreach ($time as $each) {
            if (time() > strtotime(date('Y-m-d') . ' ' . $each->time_start)) {
                $arrGetTime[] = $each['time_start'] . "" . $each['time_end'];
            }
        }


        return view('user.booking', [
            'pitch' => $pitch,
            'time' => $time,
            'arrCheck' => $arrCheck,
            'arrGetTime' => $arrGetTime,
            'dateSearch' => $dateSearch,
            'timeStartSearch' => $timeStartSearch,
            'timeEndSearch' => $timeEndSearch,
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
                ->where('date_receive', '=', $request->date)
                ->where('time_id', '=', $request->selector)
                ->first();
            if ($checkExist) {
                $msg = "Sân lớn của sân này đã được người khác đặt giờ này!!";
                return redirect()->back()->with('msg', $msg);
            }
        } else if ($checkPitchBig != null) {
            $array = [];
            $getChildren = Pitch::query()
                ->where('pitch_id', '=', $pitch->id)
                ->get()->toArray();

            foreach ($getChildren as $key => $each) {
                $array[] = $each;

            }
            $checkExist = Bill::query()->where(function ($q) use ($array) {
                foreach ($array as $key => $child_id) {

                    $q->orWhere('pitch_id', '=', $child_id['id']);
                }
            })->where('status', '=', BillStatusEnum::DA_DUYET)
                ->where('date_receive', '=', $request->date)
                ->where('time_id', '=', $request->selector)
                ->get()->count();
            if ($checkExist) {
                $msg = "Sân nhỏ của sân này đã được người khác đặt giờ này!!";
                return redirect()->back()->with('msg', $msg);
            }
        }
        $name_time = Time::query()->where('id', $request->selector)->value('time_start');
        $expected_time = $request->date . ' ' . $name_time;


        Bill::create([
            'email_receive' => $request->email,
            'name_receive' => $request->name_receive,
            'phone_receive' => $request->phone,
            'date_receive' => $request->date,
            'time_id' => $request->selector,
            'price' => $price,
            'pitch_id' => $pitch_id,
            'expected_time' => $expected_time,

        ]);
        return redirect()->route('index');


    }


}
