<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log, Auth;

class ClientLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client', ['except' => 'logout']);
    }

    public function loginForm()
    {
        return view('auth.client_login');
    }

    public function login(Request $request)
    {
        // input validation
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);

        // auth validation
        if (Auth::guard('client')->attempt($request->only('email', 'password'))) {
            return redirect()->route('schedule.index');
        }

        return redirect()->back()
                        ->withInput($request->only('email'))
                        ->with('error', 'Email or password is wrong.');
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        return redirect()->route('showLoginForm');
    }
}
