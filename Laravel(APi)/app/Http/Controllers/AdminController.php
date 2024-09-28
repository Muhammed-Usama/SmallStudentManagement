<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function con(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::guard('user')->attempt($validatedData)) {
            // Authentication successful, redirect to dashboard
            return redirect()->route('dashboard');
        } else {
            // Authentication failed, redirect back with error message
            return redirect('admin/login')->with('error_message', 'Invalid Email or Password!');
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('admin/login');
    }

}
