<?php
namespace App\Http\Controllers;


use App\Models\Bill;
use App\Models\Pitch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class StatisticController extends   Controller{
    public function __construct()
    {
        View::share('title',ucwords('Dashboard'));
    }
    public function index()
    {
       $getSlotTimeMost=  DB::table('times')
            ->selectRaw('times.id')
            ->selectRaw('time_start')
            ->selectRaw('time_end')
            ->selectRaw('count(bills.id) as sl')
            ->join('bills', 'bills.time_id' ,'=', 'times.id')
            ->groupBy('times.id')
            ->orderBy('sl', 'desc')
            ->first();

        $getBillOfArea = DB::table('bills')
            ->selectRaw('areas.name as country, count(bills.id) as visits')
            ->join('pitches','pitches.id','=','bills.pitch_id')
            ->rightJoin('areas','pitches.area_id','=','areas.id')
            ->groupBy('areas.id')
            ->orderBy('visits', 'desc')
            ->first();


        $totalBill= Bill::query()->count('id');

        $totalPrice=Bill::query()
            ->sum('price');


        return view('admin.dashboard',[
            'getSlotTimeMost' => $getSlotTimeMost,
            'getBillOfArea' => $getBillOfArea,
            'totalPrice' => $totalPrice,
            'totalBill' => $totalBill,
        ]);
    }
    public function apiSum()
    {
        return  DB::table('bills')
        ->selectRaw('areas.name as country, count(bills.id) as visits')
            ->join('pitches','pitches.id','=','bills.pitch_id')
            ->rightJoin('areas','pitches.area_id','=','areas.id')
            ->groupBy('areas.id')
//            ->whereMonth('date_receive','=',now()->month)
            ->whereMonth('date_receive','=',8)
            ->get();



    }
    public function apiStatus()
    {
        return Bill::query()
            ->selectRaw("SUM(CASE WHEN status = '1' THEN 1  END) as Success" )
            ->selectRaw("SUM(CASE WHEN status = '2' THEN 1  END) as Failed" )
            ->selectRaw("SUM(CASE WHEN status >= 1 THEN 1  END) as Sum" )

        ->get();
    }
}
