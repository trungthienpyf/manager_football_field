<?php

namespace App\Http\Controllers;

use App\Enums\BillStatusEnum;
use App\Events\AceptBills;
use App\Listeners\AceptAllBillsDuplicate;
use App\Models\Area;
use App\Models\Bill;
use App\Models\Pitch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->table = (new Bill())->getTable();
        View::share('title', ucwords($this->table));
    }

    public function index()
    {
        $bills = Bill::query()->where('status', BillStatusEnum::DANG_DAT)->latest()->paginate();
        return view('admin.booking.index', [
            'bills' => $bills
        ]);
    }
    public function checkBill( Request $request )
    {
        $bill = Bill::where('id',$request->id);


        $arrBill = $bill->first()->toArray();

        $time_id = $arrBill['time_id'];
        $pitch_id = $arrBill['pitch_id'];
        $date_receive = $arrBill['date_receive'];


        $bills = Bill::get()->where('time_id', $time_id)
            ->where('pitch_id', $pitch_id)
            ->where('date_receive', $date_receive)
            ->where('status',BillStatusEnum::DANG_DAT)
            ->where('id','!=',$request->id);

        if ($bills->count()>= 1) {
            $arrExcept=[];
            foreach($bills as $bill) {
                $arrExcept[] = $bill;

            }

            return response()->json([
                'success' => true,
                'warning' => 'Sân này và khung giờ này đang có nhiều người đặt, duyệt đơn này các đơn cùng giờ sẽ bị hủy!',
                'data'=>$arrExcept
            ]);
        }
        return response()->json([
            'success' => true,

        ]);
    }

    public function accept_booking( Request $request )
    {

        $check=true;


        $bill = Bill::where('id',$request->id);


        $arrBill = $bill->first()->toArray();

        $time_id = $arrBill['time_id'];
        $pitch_id = $arrBill['pitch_id'];
        $date_receive = $arrBill['date_receive'];



        $bill->update(['status' => BillStatusEnum::DA_DUYET]);
//     AceptBills::dispatch($time_id, $pitch_id, $date_receive);

        $arrId = event(new AceptBills($time_id,$pitch_id,$date_receive));

        return response()->json([
            'success' => true,
            'msg' => 'Duyệt đơn thành công',
            'id'=>$arrId[0]
        ]);
    }




    public function cancel_booking(Request $request)
    {

        Bill::where('id', $request->id)->update(['status' => BillStatusEnum::DA_HUY]);
        return response()->json([
            'success' => true,
        ]);
    }


}
