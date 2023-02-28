<?php

namespace App\Repositories\User;

use App\Interfaces\User\RepairmentInterface;
use App\Models\Repairment;

class RepairmentRepository implements RepairmentInterface
{
    public function index()
    {
        $data = [
            'repairments' => Repairment::paginate(10),
            'title' => 'Repairment'
        ];

        return view('user.service.index', $data);
    }
}