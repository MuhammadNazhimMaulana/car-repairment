<?php

namespace App\Repositories\Webhook;

use App\Interfaces\Webhook\WebhookInterface;
use Illuminate\Http\Request;
use App\Models\{Repairment, Transaction};
use Illuminate\Support\Facades\DB;
use Throwable;

class WebhookRepository implements WebhookInterface
{
    public function index(Request $request)
    {
        DB::beginTransaction();
        try{
            // Making Sure Webhook From Midtrans
            $hash = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . env('MIDTRANS_SERVER_KEY'));
    
            if($request->signature_key === $hash)
            {
                // Find Transaction
                $transaction = Transaction::where('midtrans_order_id', $request->order_id)->first();
    
                // Find Order
                $order = Repairment::find($transaction->repairment_id);
                $order->status = Repairment::DONE_STATUS;
                $order->save();
            }
    
            DB::commit();
        }catch(Throwable $e){
            DB::rollBack();
        }
    }
}