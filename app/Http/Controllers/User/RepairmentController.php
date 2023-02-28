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

    public function show(int $id)
    {
        return $this->repairmentInterface->show($id);
    }

    public function store(Request $request)
    {
        return $this->repairmentInterface->store($request);
    }

    public function update(Request $request, int $id)
    {
        return $this->repairmentInterface->update($request, $id);
    }
}
