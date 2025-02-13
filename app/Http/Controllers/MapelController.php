<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::all();
        return view('admin.mapel.index', compact('mapels'));
    }

    // Show Create Form
    public function create()
    {
        return view('admin.mapel.create');
    }

    // Store New Guru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Mapel::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('mapel.index')->with('success', 'Guru created successfully.');
    }

    // Show Edit Form
    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('admin.mapel.edit', compact('mapel'));
    }

    // Update Guru
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('mapel.index')->with('success', 'Guru updated successfully.');
    }

    // Delete Guru
    public function destroy($id)
    {
        $guru = Mapel::findOrFail($id);
        $guru->delete();

        return redirect()->route('mapel.index')->with('success', 'Guru deleted successfully.');
    }
}
