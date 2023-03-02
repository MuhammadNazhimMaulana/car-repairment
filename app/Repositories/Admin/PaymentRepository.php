<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\PaymentInterface;
use Illuminate\Support\Facades\Auth;

class PaymentRepository implements PaymentInterface
{
    public function index()
    {
        $data = [
            'user' => Auth::user(),
            'title' => 'Payment'
        ];

        return view('user.service.payment', $data);
    }
}