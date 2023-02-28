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
        // User
        $user =  Auth::user();

        // Repairment List
        $repairments = Repairment::paginate(10);

        // If Admin
        if($user->hasRole('admin'))
        {
            $repairments = Repairment::where('status', 'pending')->paginate(10);
        }

        $data = [
            'user' => $user,
            'repairments' => $repairments,
            'title' => 'Repairment'
        ];

        return view('user.service.index', $data);
    }

    public function show(int $id)
    {
        // Find Data
        $repair = Repairment::find($id);

        return response()->json([
            'success'=>'Data is successfully retrieved',
            'id' => $repair->id,
        ]);
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

    public function update(Request $request, int $id)
    {
        // Save New Data
        $repairment = Repairment::find($id);
        $repairment->status = $request->status;
        $repairment->fee = $request->fee;
        $repairment->save();

        return response()->json([
            'success'=>'Data is successfully updated',
        ]);
    }
}