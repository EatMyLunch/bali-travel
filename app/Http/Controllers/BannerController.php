<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|url',
        ]);

        Banner::create($request->all());

        return redirect()->route('banners.index')
            ->with('success', 'Banner created successfully.');
    }

    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image' => 'required|url',
        ]);

        $banner->update($request->all());

        return redirect()->route('banners.index')
            ->with('success', 'Banner updated successfully');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('banners.index')
            ->with('success', 'Banner deleted successfully');
    }
}
