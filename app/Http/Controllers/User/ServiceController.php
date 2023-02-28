<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\User\ServiceInterface;

class ServiceController extends Controller
{
    public function __construct(ServiceInterface $serviceInterface)
    {
        $this->serviceInterface = $serviceInterface;
    }

    public function index()
    {
        return $this->serviceInterface->index();
    }
}
