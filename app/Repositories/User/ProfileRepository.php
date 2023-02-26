<?php

namespace App\Repositories\User;

use App\Interfaces\User\ProfileInterface;
use Illuminate\Support\Facades\Auth;

class ProfileRepository implements ProfileInterface
{
    public function index()
    {
        $data = [
            'user' => Auth::user(),
            'title' => 'Profile'
        ];

        return view('user.profile', $data);
    }
}