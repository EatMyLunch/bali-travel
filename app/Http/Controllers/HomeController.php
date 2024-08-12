<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Package;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $packages = Package::take(6)->get();
        $videos = Video::all();
        return view('home.index', compact('banners', 'packages', 'videos'));
    }
}
