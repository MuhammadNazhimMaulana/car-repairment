<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\User\ProfileInterface;

class ProfileController extends Controller
{
    public function __construct(ProfileInterface $profileInterface)
    {
        $this->profileInterface = $profileInterface;
    }

    public function index()
    {
        return $this->profileInterface->index();
    }
    
    public function update(Request $request)
    {
        return $this->profileInterface->update($request);
    }
}
