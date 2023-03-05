<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\PaymentInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Repairment;
use App\Models\Transaction;

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

        return view('admin.payment', $data);
    }

    public function store(int $id)
    {
        // Update Repairment
        $repairment = Repairment::find($id);
        $repairment->status = Repairment::PENDING_STATUS;
        $repairment->save();

        // Redirect
        return redirect('/admin/payment')->with('success', 'Payment Generated');
    }
}