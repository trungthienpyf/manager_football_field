<?php

namespace App\Listeners;

use App\Enums\BillStatusEnum;
use App\Events\AceptBills;
use App\Models\Bill;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AceptAllBillsDuplicate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AceptBills  $event
     * @return array
     */
    public function handle(AceptBills $event)
    {
        $arrId=[];
        $findBills=  Bill::query()
            ->where('time_id',$event->time_id)
            ->where('pitch_id',$event->pitch_id)
            ->where('date_receive',$event->date_receive)
            ->where('status',BillStatusEnum::DANG_DAT)->get();

        foreach($findBills as $bill) {
            $arrId[] = $bill;

        }


        $bills=  Bill::get();

        foreach($bills as $bill){
            $bill->where('time_id',$event->time_id)
                ->where('pitch_id',$event->pitch_id)
                ->where('date_receive',$event->date_receive)
                ->where('status',BillStatusEnum::DANG_DAT)
          ->update(['status' => BillStatusEnum::DA_HUY]);

        }

        return $arrId;
    }
}
