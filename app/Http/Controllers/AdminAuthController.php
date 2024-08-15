<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home.index'));
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function test()
    {
        $admin = Admin::create([
            'username' => 'andas',
            'password' => Hash::make('loollool')
        ]);

        return "Admin user created successfully. Username: admin, Password: password";
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('home.index');
    }
}
