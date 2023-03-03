<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\PaymentInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Repairment;

class PaymentRepository implements PaymentInterface
{
    public function index()
    {
        // Get All Process
        $process = Repairment::where('status', 'process')->paginate(10);

        $data = [
            'user' => Auth::user(),
            'payments' => $process,
            'title' => 'Payment'
        ];

        return view('user.service.payment', $data);
    }
}