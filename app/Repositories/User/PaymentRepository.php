<?php

namespace App\Repositories\User;

use App\Interfaces\User\PaymentInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\{Repairment, Transaction};

class PaymentRepository implements PaymentInterface
{
    public function index()
    {
        // User
        $user =  Auth::user();

        // Get All Pending Process
        $process = Repairment::with('transaction')->where('user_id', $user->id)->where('status', Repairment::PENDING_STATUS)->paginate(10);

        // dd($process[0]->transaction);
        $data = [
            'user' => $user,
            'payments' => $process,
            'title' => 'Payment'
        ];

        return view('user.service.payment', $data);
    }
}