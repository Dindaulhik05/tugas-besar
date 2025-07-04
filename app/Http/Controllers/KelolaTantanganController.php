<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tantangan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class KelolaTantanganController extends Controller
{
    public function index()
    {
        $tantangans = Tantangan::all();
        return view('Admin.kelola_tantangan.index', compact('tantangans'));
    }

    public function create()
    {
        return view('Admin.kelola_tantangan.create');
    }

    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'no_tantangan' => 'required',
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',
            'video_embed_url' => 'required|url',
            'video_thumbnail' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',  // Pastikan hanya gambar yang diterima
            'tag' => 'required',
            'duration' => 'required',
            'poin_tantangan' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        // Buat instance Tantangan baru
        $tantangan = new Tantangan();
        $tantangan->no_tantangan = $request->no_tantangan;
        $tantangan->title = $request->title;
        $tantangan->description = $request->description;
        $tantangan->details = $request->details;
        $tantangan->video_embed_url = $request->video_embed_url;
        $tantangan->tag = $request->tag;
        $tantangan->duration = $request->duration;
        $tantangan->poin_tantangan = $request->poin_tantangan;
        $tantangan->tanggal_mulai = $request->tanggal_mulai;
        $tantangan->tanggal_selesai = $request->tanggal_selesai;


        // Menangani upload thumbnail video
        if ($request->hasFile('video_thumbnail')) {
            // Menyimpan file ke dalam storage
            $path = $request->file('video_thumbnail')->store('thumbnails', 'public');  // Menyimpan di folder 'storage/app/public/thumbnails'
            $tantangan->video_thumbnail = $path;  // Menyimpan path file di database
        }

        // Simpan tantangan ke database
        $tantangan->save();

        // Redirect setelah berhasil menambahkan tantangan
        return redirect()->route('kelola_tantangan.index')->with('success', 'Tantangan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tantangan = Tantangan::findOrFail($id);
        return view('Admin.kelola_tantangan.edit', compact('tantangan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'no_tantangan' => 'required',
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',
            'video_embed_url' => 'required|url',
            'video_thumbnail' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',  // Validasi untuk file gambar
            'tag' => 'required',
            'duration' => 'required',
            'poin_tantangan' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        // Menemukan tantangan yang akan di-update
        $tantangan = Tantangan::findOrFail($id);

        // Update data selain video_thumbnail
        $tantangan->no_tantangan = $request->no_tantangan;
        $tantangan->title = $request->title;
        $tantangan->description = $request->description;
        $tantangan->details = $request->details;
        $tantangan->video_embed_url = $request->video_embed_url;
        $tantangan->tag = $request->tag;
        $tantangan->duration = $request->duration;
        $tantangan->poin_tantangan = $request->poin_tantangan;
        $tantangan->tanggal_mulai = $request->tanggal_mulai;
        $tantangan->tanggal_selesai = $request->tanggal_selesai;

        // Menangani upload video_thumbnail jika ada file baru
        if ($request->hasFile('video_thumbnail')) {
            // Hapus file lama jika ada
            if ($tantangan->video_thumbnail) {
                Storage::disk('public')->delete($tantangan->video_thumbnail);  // Menghapus file yang lama
            }

            // Ambil file yang di-upload
            $file = $request->file('video_thumbnail');

            // Ganti nama file agar unik
            $filename = time() . '_' . $file->getClientOriginalName();

            // Menyimpan file ke dalam folder 'thumbnails' di storage
            $path = $file->storeAs('thumbnails', $filename, 'public');

            // Simpan path file ke database
            $tantangan->video_thumbnail = $path;
        }

        // Simpan perubahan ke database
        $tantangan->save();

        // Redirect setelah berhasil meng-update data
        return redirect()->route('kelola_tantangan.index')->with('success', 'Tantangan berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $tantangan = Tantangan::findOrFail($id);
        $tantangan->delete();
        return redirect()->route('kelola_tantangan.index')->with('success', 'Tantangan berhasil dihapus!');
    }
}
