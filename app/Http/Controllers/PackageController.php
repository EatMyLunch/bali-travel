<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'description' => 'required|string',
        ]);

        Package::create($request->all());

        return redirect()->route('packages.index')
            ->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'description' => 'required|string',
        ]);

        $package->update($request->all());

        return redirect()->route('packages.index')
            ->with('success', 'Package updated successfully');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('packages.index')
            ->with('success', 'Package deleted successfully');
    }
}
