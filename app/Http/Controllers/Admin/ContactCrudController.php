<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactCrudController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        if (!$contact) {
            $contact = Contact::create([
                'address' => 'Jl. Boulevard Bukit Gading Raya Blok A, Kelapa Gading, Jakarta Utara, DKI Jakarta 14240',
                'email' => 'lppm@kwikkiangie.ac.id',
                'phone' => '(021) 4508999',
                'whatsapp' => '082122355330',
                'service_hours' => 'Senin - Jumat: 08:30 - 16:30 WIB',
                'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8627409252327!2d106.8903523!3d-6.1491295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f547c10b777f%3A0xc036987c69992b15!2sKwik%20Kian%20Gie%20School%20of%20Business!5e0!3m2!1sid!2sid!4v1716300000000!5m2!1sid!2sid',
            ]);
        }
        return view('admin.kontak.edit', compact('contact'));
    }

    public function update(Request $request, Contact $kontak)
    {
        $data = $request->validate([
            'address' => 'required|string|max:500',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:100',
            'whatsapp' => 'required|string|max:100',
            'service_hours' => 'required|string|max:255',
            'google_maps_embed' => 'nullable|string|max:2000',
        ]);

        $kontak->update($data);

        return redirect()->route('admin.kontak.index')->with('success', 'Informasi Kontak & Layanan berhasil diperbarui.');
    }
}
