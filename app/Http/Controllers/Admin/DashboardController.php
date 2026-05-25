<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index()
    {
        $dosenCount = Dosen::count();
        $beritaCount = Berita::count();
        return view('admin.dashboard', compact('dosenCount', 'beritaCount'));
    }
}
