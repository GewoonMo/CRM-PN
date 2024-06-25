<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



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

    use AuthenticatesUsers;


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

    public function google()
    {
        // send the user's request to google
        return Socialite::driver('google')->redirect();
    }
    public function googleRedirect()
    {
        // get oauth request from google to authenticate user
        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }

    public function github()
    {
        // send the user's request to github
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect()
    {
        // get oauth request from github to authenticate user
        $user = Socialite::driver('github')->stateless()->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email','=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->avatar = $data->avatar;
            $user->role_id = $data->role_id = 2;
            $user->password = Hash::make(Str::random(24));
            $user->save();
        }
        Auth::login($user);
    }
}
