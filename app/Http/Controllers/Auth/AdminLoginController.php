<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log, Auth, App\Admin;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function loginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        // input validation
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        // auth validation
        if (Auth::guard('admin')->attempt($request->only('username', 'password'))) {
            return redirect()->route('client.index');
        }

        return redirect()->back()
                        ->withInput($request->only('username'))
                        ->with('error', 'Username or password is wrong.');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.showLoginForm');
    }
}
