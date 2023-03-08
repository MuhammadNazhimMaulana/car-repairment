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

    public function admin()
    {
        return $this->repairmentInterface->admin();
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

    public function pdf()
    {
        return $this->repairmentInterface->pdf();
    }

    public function excel()
    {
        return $this->repairmentInterface->excel();
    }
}
