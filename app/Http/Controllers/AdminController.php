<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.adminHome');
    }
    
    public function ReturnLogin()
    {
        return view('auth.login');
    }

    public function ForgetPassword()
    {
        return view('auth.forgot-password');
    }
    public function Register()
    {
        return view('auth.register');
    }
    
    public function profileAdmin(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
}
