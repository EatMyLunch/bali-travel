<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
            
            Banner::create([
                'image' => $imagePath
            ]);

            return redirect()->route('banners.index')
                ->with('success', 'Banner created successfully.');
        }

        return back()->with('error', 'Failed to upload image.');
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }

            $imagePath = $request->file('image')->store('banners', 'public');
            
            $banner->update([
                'image' => $imagePath
            ]);

            return redirect()->route('banners.index')
                ->with('success', 'Banner updated successfully');
        }

        return back()->with('error', 'Failed to upload image.');
    }

    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }
    

    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('banners.index')
            ->with('success', 'Banner deleted successfully');
    }
}
