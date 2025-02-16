<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murids = Murid::all();
        return view('murid.index', compact('murids'));
    }

    // Show Create Form
    public function create()
    {
        return view('murid.create');
    }

    // Store New Guru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
        ]);

        Murid::create([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir ?? null, // Pastikan ini bisa NULL
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('murid.index')->with('success', 'Guru created successfully.');
    }

    // Show Edit Form
    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        return view('murid.edit', compact('murid'));
    }

    // Update Guru
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
        ]);

        $murid = Murid::findOrFail($id);
        $murid->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('murid.index')->with('success', 'Guru updated successfully.');
    }

    // Delete Guru
    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);
        $murid->delete();

        return redirect()->route('murid.index')->with('success', 'Guru deleted successfully.');
    }
}
