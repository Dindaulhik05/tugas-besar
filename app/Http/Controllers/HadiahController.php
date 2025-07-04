<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hadiah;

class HadiahController extends Controller
{
    public function index()
    {
        $hadiahs = Hadiah::all(); // Mengambil semua data hadiah dari database
        return view('Admin.kelola_hadiah.index', compact('hadiahs'));
    }

    // Menampilkan form untuk menambahkan hadiah
    public function create()
    {
        return view('Admin.kelola_hadiah.create');
    }

    // Menyimpan data hadiah baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_hadiah' => 'required',
            'points' => 'required|integer',
            'stok' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hadiah', 'public');
        }

        Hadiah::create($data);
        return redirect()->route('hadiah.index')->with('success', 'Hadiah berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit hadiah
    public function edit(Hadiah $hadiah)
    {
        return view('Admin.kelola_hadiah.edit', compact('hadiah'));
    }

    // Memperbarui data hadiah
    public function update(Request $request, Hadiah $hadiah)
    {
        $request->validate([
            'nama_hadiah' => 'required',
            'points' => 'required|integer',
            'stok' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hadiah', 'public');
        }

        $hadiah->update($data);
        return redirect()->route('hadiah.index')->with('success', 'Hadiah berhasil diperbarui.');
    }

    // Menghapus hadiah
    public function destroy(Hadiah $hadiah)
    {
        $hadiah->delete();
        return redirect()->route('hadiah.index')->with('success', 'Hadiah berhasil dihapus.');
    }
}
