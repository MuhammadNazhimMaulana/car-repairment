<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function _registerOrLoginUser($data){
        $user = User::where('email',$data->email)->first();
            if(!$user){
                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->provider_id = $data->id;
                $user->avatar = $data->avatar;
                $user->save();

                // Role
                $user->assignRole('user');
            }
        Auth::login($user);
    }

    //Google Login
    public function redirectToGoogle(){
        return Socialite::driver('google')->stateless()->redirect();
    }
    
    //Google callback  
    public function handleGoogleCallback(){
    
        $user = Socialite::driver('google')->stateless()->user();
        
        $this->_registerorLoginUser($user);
        return redirect()->route('home');
    }

    //Github Login
    public function redirectToGithub(){
        return Socialite::driver('github')->stateless()->redirect();
    }
    
    //github callback  
    public function handleGithubCallback(){
    
        $user = Socialite::driver('github')->stateless()->user();
    
        $this->_registerorLoginUser($user);
        return redirect()->route('home');
    }

    // Custom Logout
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }
}
