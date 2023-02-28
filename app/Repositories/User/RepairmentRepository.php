<?php

namespace App\Repositories\User;

use App\Interfaces\User\RepairmentInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Repairment;

class RepairmentRepository implements RepairmentInterface
{
    public function index()
    {
        $data = [
            'user' => Auth::user(),
            'repairments' => Repairment::paginate(10),
            'title' => 'Repairment'
        ];

        return view('user.service.index', $data);
    }

    public function store(Request $request)
    {
        // Save New Data
        $repairment = new Repairment;
        $repairment->user_id = $request->user_id;
        $repairment->vehicle_name = $request->vehicle_name;
        $repairment->issue = $request->issue;
        $repairment->save();

        return redirect('/user/repairment')->with('success', 'New Repairment Added');
    }
}