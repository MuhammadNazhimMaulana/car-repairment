<?php

namespace App\Observers;

use App\Models\{Transaction, Repairment};
use Illuminate\Support\Facades\Log;
use App\Helpers\MidtransHelper;
use Illuminate\Support\Facades\DB;
use Throwable;

class TransactionObserver
{
    /**
     * Handle the repairment "created" event.
     *
     * @param  \App\Repairment  $repairment
     * @return void
     */
    public function updated(Repairment $repairment)
    {
        DB::beginTransaction();
        try {

            if($repairment->status == Repairment::PENDING_STATUS)
            {
                // Create Order in Midtrans
                $params = [
                    'json' => [
                        'payment_type' => 'bank_transfer',
                        'bank_transfer' => json_decode(json_encode(["bank" => "permata"])),
                        'transaction_details' => json_decode(json_encode(["order_id" => time(), "gross_amount" => $repairment->fee])),
                    ]
                ];
    
                $transaction = MidtransHelper::createTransaction($params);
    
                // Log::info(dd($transaction));
                $save_transaction = new Transaction;
                $save_transaction->repairment_id = $repairment->id;
                $save_transaction->midtrans_transaction_id = $transaction->transaction_id;
                $save_transaction->midtrans_order_id = $transaction->order_id;
                $save_transaction->midtrans_va_number = $transaction->permata_va_number;
                // $save_transaction->midtrans_va_number = $transaction->va_numbers[0]->va_number; BNI and Others
                $save_transaction->total = $transaction->gross_amount;
                $save_transaction->save();
            }

            DB::commit();
        } catch (Throwable $e) {
            Log::info($e);
            DB::rollback();
        }
    }
}
