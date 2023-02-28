<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\User\RepairmentInterface;

class RepairmentController extends Controller
{
    public function __construct(RepairmentInterface $repairmentInterface)
    {
        $this->repairmentInterface = $repairmentInterface;
    }

    public function index()
    {
        return $this->repairmentInterface->index();
    }

    public function store(Request $request)
    {
        return $this->repairmentInterface->store($request);
    }
}
