<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccessController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('access.index', compact('admins'));
    }

    public function create()
    {
        return view('access.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('access.index')->with('success', 'Admin created successfully.');
    }

    public function destroy($id)
{
    $admin = Admin::findOrFail($id);
    $admin->delete();

    return redirect()->route('access.index')->with('success', 'Admin deleted successfully.');
}

}
