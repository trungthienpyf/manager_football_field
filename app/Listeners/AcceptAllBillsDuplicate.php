<?php

namespace App\Listeners;

use App\Enums\BillStatusEnum;
use App\Events\AcceptBills;
use App\Models\Bill;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AcceptAllBillsDuplicate
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
     * @param \App\Events\AcceptBills $event
     * @return array
     */
    public function handle(AcceptBills $event)
    {
        $bills = Bill::query()->where('time_id', $event->time_id)
            ->where('pitch_id', $event->pitch_id)
            ->where('date_receive', $event->date_receive)
            ->where('status', BillStatusEnum::DANG_DAT)
            ->get();


        foreach ($bills as $bill) {
            $bill->status = BillStatusEnum::DA_HUY;
            $bill->save();

        }

        return $bills->pluck('id')->toarray();
    }
}
