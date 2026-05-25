<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function jurnal()
    {
        $publications = Publication::where('type', 'Jurnal')->where('status', 'published')->orderBy('year', 'desc')->get();
        return view('publikasi.jurnal', compact('publications'));
    }

    public function artikelIlmiah()
    {
        $publications = Publication::where('type', 'Artikel Ilmiah')->where('status', 'published')->orderBy('year', 'desc')->get();
        return view('publikasi.artikel-ilmiah', compact('publications'));
    }

    public function prosiding()
    {
        $publications = Publication::where('type', 'Prosiding')->where('status', 'published')->orderBy('year', 'desc')->get();
        return view('publikasi.prosiding', compact('publications'));
    }
}
