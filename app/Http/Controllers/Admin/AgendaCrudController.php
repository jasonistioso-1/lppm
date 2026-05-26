<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaCrudController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('event_date', 'desc')->paginate(10);
        return view('admin.agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'status' => 'required|string|in:published,draft',
        ]);

        Agenda::create($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda Kegiatan baru berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'status' => 'required|string|in:published,draft',
        ]);

        $agenda->update($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda Kegiatan berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda Kegiatan berhasil dihapus.');
    }
}
