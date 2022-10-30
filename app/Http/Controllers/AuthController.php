<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;




class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {

        $this->validate($request, [
            'username'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL )
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('username')
        ]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            return redirect()->route('banner.index')->with('success', 'Success Login');
        }

        return redirect()->route('login')->with('error',' Email-Address Or Username And Password Are Wrong.');
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success', ' Sukses Logout');
    }
}
