<?php

namespace App\Http\Controllers;

use App\Enums\BillStatusEnum;


use App\Mail\BillMail;
use App\Models\Bill;
use App\Models\Pitch;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class TestController extends Controller
{
    public function test()
    {
        $bills = Bill::query()->where('time_id',7)
            ->where('pitch_id', 2)
            ->where('date_receive', "2022-08-26")
            ->where('status', BillStatusEnum::DANG_DAT)
            ->get();

        foreach ($bills as $bill) {
            $bill->status = BillStatusEnum::DA_HUY;
            $bill->admin_id =1;
            $bill->save();

        }
    }
}
