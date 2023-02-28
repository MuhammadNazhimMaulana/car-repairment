<?php

namespace App\Repositories\User;

use App\Interfaces\User\ServiceInterface;
use App\Models\Service;

class ServiceRepository implements ServiceInterface
{
    public function index()
    {
        $data = [
            'services' => Service::paginate(10),
            'title' => 'Service'
        ];

        return view('user.service.index', $data);
    }
}