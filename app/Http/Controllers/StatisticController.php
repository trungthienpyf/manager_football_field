<?php
namespace App\Http\Controllers;


use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class StatisticController extends   Controller{
    public function __construct()
    {
        View::share('title',ucwords('Dashboard'));
    }
    public function index()
    {


        return view('admin.dashboard');
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
