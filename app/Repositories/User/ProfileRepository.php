<?php

namespace App\Repositories\User;

use App\Interfaces\User\ProfileInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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

    public function update(Request $request)
    {
        $user = User::find($request->id);
        
        // Update User
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/user/profile')->with('success', 'Profile Updated');
    }
}