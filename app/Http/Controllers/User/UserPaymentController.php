<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\User\PaymentInterface;

class UserPaymentController extends Controller
{
    public function __construct(PaymentInterface $paymentInterface)
    {
        $this->paymentInterface = $paymentInterface;
    }

    public function index()
    {
        return $this->paymentInterface->index();
    }
}
