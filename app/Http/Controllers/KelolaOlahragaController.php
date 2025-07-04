<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Olahraga;

class KelolaOlahragaController extends Controller
{
    public function index()
    {
        $olahragas = Olahraga::paginate(5); // Sesuaikan jumlah per halaman
        return view('Admin.kelola_olahraga.index', compact('olahragas'));
    }

    public function create()
{
    return view('Admin.kelola_olahraga.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'deskripsi' => 'required|string',
        'kategori' => 'required|string',
        'durasi' => 'required|string',
        'url_video' => 'nullable|url',
        'thumbnails' => 'nullable|image|max:2048'
    ]);

    $data = $request->all();

    if ($request->hasFile('thumbnails')) {
        $data['thumbnails'] = $request->file('thumbnails')->store('thumbnails', 'public');
    }

    Olahraga::create($data);

    return redirect()->route('admin.olahraga.index')->with('success', 'Data olahraga berhasil ditambahkan.');
}

public function edit($id)
{
    $olahraga = Olahraga::findOrFail($id);
    return view('Admin.kelola_olahraga.edit', compact('olahraga'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string',
        'deskripsi' => 'required|string',
        'kategori' => 'required|string',
        'durasi' => 'required|string',
        'url_video' => 'nullable|url',
        'thumbnails' => 'nullable|image|max:2048'
    ]);

    $olahraga = Olahraga::findOrFail($id);
    $data = $request->all();

    if ($request->hasFile('thumbnails')) {
        $data['thumbnails'] = $request->file('thumbnails')->store('thumbnails', 'public');
    }

    $olahraga->update($data);

    return redirect()->route('admin.olahraga.index')->with('success', 'Data olahraga berhasil diperbarui.');
}

    public function destroy($id)
    {
        $olahraga = Olahraga::findOrFail($id);
        $olahraga->delete();

        return redirect()->route('admin.olahraga.index')->with('success', 'Data olahraga berhasil dihapus.');
    }
}
