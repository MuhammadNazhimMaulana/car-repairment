<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Admin\AdminPaymentInterface;

class AdminPaymentController extends Controller
{
    public function __construct(AdminPaymentInterface $paymentInterface)
    {
        $this->paymentInterface = $paymentInterface;
    }

    public function index()
    {
        return $this->paymentInterface->index();
    }

    public function store(int $id)
    {
        return $this->paymentInterface->store($id);
    }
}
