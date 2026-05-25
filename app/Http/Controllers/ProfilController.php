<?php

namespace App\Http\Controllers;

use App\Models\ProfilePage;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function tentangKami()
    {
        $page = ProfilePage::where('page_key', 'tentang-kami')->first();
        return view('profil.tentang-kami', compact('page'));
    }

    public function visiMisi()
    {
        $page = ProfilePage::where('page_key', 'visi-misi')->first();
        return view('profil.visi-misi', compact('page'));
    }

    public function strukturOrganisasi()
    {
        $page = ProfilePage::where('page_key', 'struktur-organisasi')->first();
        return view('profil.struktur-organisasi', compact('page'));
    }

    public function prestasi()
    {
        $page = ProfilePage::where('page_key', 'prestasi')->first();
        return view('profil.prestasi', compact('page'));
    }
}
