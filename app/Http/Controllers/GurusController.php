<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GurusController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('guru.index', compact('gurus'));
    }

    // Show Create Form
    public function create()
    {
        return view('guru.create');
    }

    // Store New Guru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Guru::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru created successfully.');
    }

    // Show Edit Form
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    // Update Guru
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru updated successfully.');
    }

    // Delete Guru
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru deleted successfully.');
    }
}
