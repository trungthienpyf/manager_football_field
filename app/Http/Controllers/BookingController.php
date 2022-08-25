<?php

namespace App\Http\Controllers;

use App\Enums\BillStatusEnum;
use App\Events\AcceptBills;
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

    public function index(Request $request)
    {

            $status=$request->status;
            $search=$request->q;
            $date=$request->date;
            $area=$request->area;

        $statusRender=BillStatusEnum::getArrayView();
        $areaRender=Area::all();
        $q = Bill::query();

        if(!is_null($status)){
            $q->where('status', $status);
        }else{
            $q->where('status', BillStatusEnum::DANG_DAT);
        }

        if(!empty($search)){
            $q->where(function ($q) use ($search) {
                $q->orWhere('name_receive', 'like','%' . $search .'%');
                $q->orWhere('email_receive', 'like','%' . $search .'%');
                $q->orWhere('phone_receive', 'like','%' . $search .'%');
            });
        }
        if(!empty($date)){
            $q->where('date_receive', $date);
        }

        if(!empty($area)){
                $q->whereRelation('pitch.area',function ($q) use($area){
                    $q->where('id',$area);
                });
        }

          $bills=$q->latest()->paginate();




        return view('admin.booking.index', [
            'bills' => $bills,
            'status' => $statusRender,
            'areaRender' => $areaRender,
        ]);

    }
    public function checkBill( Request $request )
    {
        $bill = Bill::where('id',$request->id)->first();


        $time_id = $bill['time_id'];
        $pitch_id = $bill['pitch_id'];
        $date_receive = $bill['date_receive'];


        $bills = Bill::query()->where('time_id', $time_id)
            ->where('pitch_id', $pitch_id)
            ->where('date_receive', $date_receive)
            ->where('status',BillStatusEnum::DANG_DAT)
            ->where('id','!=',$request->id)
            ->get();

        if ($bills->count()>= 1) {
            return response()->json([
                'success' => true,
                'warning' => 'Sân này và khung giờ này đang có nhiều người đặt, duyệt đơn này các đơn cùng giờ sẽ bị hủy!',
                'data'=>$bills
            ]);
        }
        return response()->json([
            'success' => true,

        ]);
    }

    public function accept_booking( Request $request )
    {

        $bill = Bill::where('id',$request->id);
       $admin_id= auth()->user()->id;

        $arrBill = $bill->first()->toArray();

        $time_id = $arrBill['time_id'];
        $pitch_id = $arrBill['pitch_id'];
        $date_receive = $arrBill['date_receive'];



        $bill->update(['status' => BillStatusEnum::DA_DUYET,
            'admin_id'       => $admin_id,
            ]);
//     AcceptBills::dispatch($time_id, $pitch_id, $date_receive);

        $arrId = event(new AcceptBills($time_id,$pitch_id,$date_receive,$admin_id));

        return response()->json([
            'success' => true,
            'msg' => 'Duyệt đơn thành công',
            'id'=>$arrId[0]
        ]);
    }




    public function cancel_booking(Request $request)
    {
        try {
            Bill::where('id', $request->id)->update(['status' => BillStatusEnum::DA_HUY]);
            return response()->json([
                'success' => true,
            ]);
        }catch (\Throwable $e) {
            return response()->json([
                'success' => false,
            ]);
        }

    }
    public function detail_Bill(Bill $bill){

        return view('admin.booking.detail_booking',['bill'=>$bill]);
    }


}
