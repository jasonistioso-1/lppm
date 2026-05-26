<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Slider;
use Illuminate\Http\Request;

use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 'active')->orderBy('sort_order', 'asc')->get();
        $beritas = Berita::where('status', 'published')->orderBy('published_at', 'desc')->take(6)->get();
        $videos = Video::where('status', 'active')->orderBy('created_at', 'desc')->take(3)->get();
        return view('home', compact('beritas', 'sliders', 'videos'));
    }
}
