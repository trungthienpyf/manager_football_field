<?php
namespace App\Http\Controllers;

use App\Enums\BillStatusEnum;
use App\Models\Area;
use App\Models\Bill;
use App\Models\Pitch;
use Illuminate\Support\Facades\View;

class BookingController extends Controller
{

    public function __construct(){
        $this->table=(new Bill())->getTable();
        View::share('title',ucwords($this->table));
    }

    public function index(){
     $bills = Bill::query()->latest()->paginate();
        return view('admin.booking.index',[
            'bills'=>$bills
        ]);
    }

    public function accept_booking( $id)
    {
       Bill::where('id',$id)->update(['status' => BillStatusEnum::DA_DUYET]);
        return redirect()->route('admin.booking.index');
    }
    public function cancel_booking( $id)
    {
        Bill::where('id',$id)->update(['status' => BillStatusEnum::DA_HUY]);
        return redirect()->route('admin.booking.index');
    }


}
