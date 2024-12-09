<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    function login()
    {
        return view('admin.auth.login');
    }

    function checkLogin(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard.home');
        } else {
            return redirect()->back()
                ->withInput(['email' => $request->email])
                ->with('errorResponse', 'This Credentials do not match our records');
        }
    }
}