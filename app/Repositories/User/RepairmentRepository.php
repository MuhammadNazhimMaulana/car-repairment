<?php

namespace App\Repositories\User;

use App\Interfaces\User\RepairmentInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Repairment;
use App\Exports\RepairmentsExport;
use Maatwebsite\Excel\Facades\Excel;

class RepairmentRepository implements RepairmentInterface
{
    const TITLE = "Repairment";

    public function index()
    {
        // User
        $user =  Auth::user();

        // Repairment List
        $repairments = Repairment::where('user_id', $user->id)->paginate(10);

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

    public function admin()
    {
        // User
        $user =  Auth::user();

        // Repairment List
        $repairments = Repairment::paginate(10);

        $data = [
            'user' => $user,
            'repairments' => $repairments,
            'title' => 'List Repairment'
        ];

        return view('admin.service.index', $data);
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

    public function pdf()
    {
        // User
        $user =  Auth::user();

        // Repairment List
        $repairments = Repairment::where('user_id', $user->id)->paginate(10);

        // Calling DOMPDF
        $pdf = App::make('dompdf.wrapper');

        // Loading view using DOMPSDF
        $pdf->loadview('user.service.pdf', [
            'user' => $user, 
            'repairments' => $repairments, 
            'title' => self::TITLE, 
            ])->setpaper('legal', 'portrait');
        
        // Showing The pdf
        return $pdf->stream('List Repairment.pdf');
    }

    public function excel()
    {
        return Excel::download(new RepairmentsExport, 'repairments.xlsx');
    }

}