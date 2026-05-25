<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    private function getContact()
    {
        return Contact::first();
    }

    public function informasiKontak()
    {
        $contact = $this->getContact();
        return view('kontak.informasi-kontak', compact('contact'));
    }

    public function jamLayanan()
    {
        $contact = $this->getContact();
        return view('kontak.jam-layanan', compact('contact'));
    }

    public function lokasiKampus()
    {
        $contact = $this->getContact();
        return view('kontak.lokasi-kampus', compact('contact'));
    }
}
