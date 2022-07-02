<?php
namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Bill;
use App\Models\Pitch;

class BookingController extends Controller
{

    public function index(){
     $bills = Bill::query()->paginate();
        return view('admin.booking.index',[
            'bills'=>$bills
        ]);
    }

    public function accept_booking( $id)
    {
       Bill::where('id',$id)->update(['status' => '1']);
        return redirect()->route('admin.booking.index');
    }
    public function cancel_booking( $id)
    {
        Bill::where('id',$id)->update(['status' => '2']);
        return redirect()->route('admin.booking.index');
    }


}
