<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function panduan()
    {
        $documents = Document::where('category', 'Panduan')->where('status', 'published')->get();
        return view('dokumen.panduan', compact('documents'));
    }

    public function template()
    {
        $documents = Document::where('category', 'Template')->where('status', 'published')->get();
        return view('dokumen.template', compact('documents'));
    }

    public function unduhan()
    {
        $documents = Document::where('category', 'Unduhan')->where('status', 'published')->get();
        return view('dokumen.unduhan', compact('documents'));
    }
}
