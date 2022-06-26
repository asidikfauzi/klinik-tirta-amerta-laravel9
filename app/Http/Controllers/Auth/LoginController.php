<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    protected function redirectTo()
    {
        return route('admin.index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return redirect()->route('login');
    }
    
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if(auth()->attempt(array('username'=>$username, 'password'=>$password)))
        {
            if(auth()->user()->role == "admin")
            {
                return redirect()->route('admin.index'); 
            }
            else if(auth()->user()->role == "rm_dony")
            {
                return redirect()->route('dony.index'); 
            }
            else if(auth()->user()->role == "rm_umum")
            {
                return redirect()->route('umum.index'); 
            }
              
        }
        else
        {
            return redirect()->route('login')->with('error', 'No Pasien atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
