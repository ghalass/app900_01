<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    function register()
    {
        return view('admin.auth.register');
    }

    function store(Request $request)
    {
        $adminKey = 'adminKey1';

        if ($request->admin_key == $adminKey) {
            $request->validate([
                'name'                      => 'required|string',
                'email'                     => 'required|email',
                'admin_key'                 => 'required|string',
                'password'                  => 'required|string|confirmed',
                'password_confirmation'     => 'required|string',
            ]);

            $newAdmin = $request->except(['password_confirmation', '_token', 'admin_key']);

            $newAdmin['password'] = Hash::make($request->password);

            Admin::create($newAdmin);

            return redirect()->route('admin.dashboard.login');
        } else {
            return redirect()->back()->with('errorResponse', 'Somthing went wrong!');
        }
    }
}