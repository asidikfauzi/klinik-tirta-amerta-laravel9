<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    public function register(Request $request)
    {
        $nama = $request->input('nama');
        $username = $request->input('username');
        $password = $request->input('password');
        $confirmpas = $request->input('password_confirmation');

        if(empty($nama) || empty($username) || empty($password))
        {
            return back()->with('failed', 'please fill your data')->withInput();
        }
        else if(strlen($password) < 8)
        {
            return back()->with('failed', 'username minimum 8 char')->withInput();
        }
        else if($password !== $confirmpas)
        {
            return back()->with('failed', 'passwords are not the same')->withInput();
        }

        $user = User::where('username', $username)->get()->toArray();

        if(count($user) > 0)
        {
            return back()->with('failed', 'Username already exists')->withInput();
        }
        $hashPassword = Hash::make($password);

        $users = new User();
        $users->nama = $nama;
        $users->username = $username;
        $users->password = $hashPassword;
        $users->save();

        return back()->with('success', 'Data succesfully saved');

    }
}
