<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuktiTantangan;
use App\Models\User;

class KonfirBuktiController extends Controller
{
    // Menampilkan semua bukti tantangan dengan pagination
    public function index(Request $request)
    {
        $totalData = BuktiTantangan::count();
        $dataPerPage = 10;
        $totalPages = ceil($totalData / $dataPerPage);
        $currentPage = $request->get('page', 1);
        $currentPage = max(1, min($currentPage, $totalPages));
        $offset = ($currentPage - 1) * $dataPerPage;

        $buktiTantangan = BuktiTantangan::with('user')->orderBy('id', 'desc')->paginate(10);  // Paginasi dengan 10 data per halaman

        
        foreach ($buktiTantangan as $bukti) {
            $bukti->user_name = User::find($bukti->user_id)->username ?? 'Tidak Diketahui';
        }

        return view('Admin.konfir_bukti.index', compact('buktiTantangan', 'totalPages', 'currentPage'));
    }

    // Menampilkan form untuk membuat bukti tantangan baru
    public function create()
    {
        return view('Admin.konfir_bukti.create');
    }

    // Menyimpan bukti tantangan baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|numeric',
            'challenge_id' => 'required|integer',
            'file_path' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'in:pending,completed',
            
        ]);

        if ($request->hasFile('file_path')) {
            // Ambil file
            $file = $request->file('file_path');
            // Ganti nama file agar unik
            $filename = time() . '_' . $file->getClientOriginalName();
            // Simpan file di 'uploads' folder dengan disk public
            $path = $file->storeAs('uploads', $filename, 'public');
            
             // Ambil nama user dari user_id
            $user = User::find($request->id);
            $name = $user ? $user->username : 'Tidak Diketahui';

            // Simpan path file ke database
            BuktiTantangan::create([
                'user_id' => $request->user_id,
                'challenge_id' => $request->challenge_id,
                'file_path' => 'uploads/' . $filename, // Menyimpan relatif path
                'status' => $request->status ?? 'pending',
                'is_claimed' => 0,
                'name' => $name
            ]);
            
            return redirect()->route('Admin.konfir_bukti.index')->with('success', 'Bukti tantangan berhasil ditambahkan!');
        } else {
            return back()->with('error', 'File tidak ditemukan.');
        }        
    }


    // Menampilkan form untuk mengedit bukti tantangan
    public function edit($id)
    {
        $bukti = BuktiTantangan::findOrFail($id);
        // Ambil semua pengguna untuk dropdown
        $users = User::all();
        return view('Admin.konfir_bukti.edit', compact('bukti', 'users'));
    }

    // Mengupdate bukti tantangan
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|numeric',
            'challenge_id' => 'required|integer',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',  // File menjadi opsional
            'status' => 'in:pending,completed',
            
        ]);

        $bukti = BuktiTantangan::findOrFail($id);

        // Mengambil path file lama
        $filePath = $bukti->file_path;

        // Jika file baru diunggah
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');
        }

        // Update bukti tantangan
        $bukti->update([
            'user_id' => $request->user_id,
            'challenge_id' => $request->challenge_id,
            'file_path' => 'uploads/' . $filePath,  // Memastikan path disimpan relatif terhadap folder public
            'status' => $request->status ?? 'pending',
            'is_claimed' => 0,
        ]);

        return redirect()->route('Admin.konfir_bukti.index')->with('success', 'Bukti tantangan berhasil diperbarui!');
    }


    // Menghapus bukti tantangan
    public function delete($id)
    {
        $bukti = BuktiTantangan::findOrFail($id);
        $bukti->delete();

        return redirect()->route('Admin.konfir_bukti.index')->with('success', 'Bukti tantangan berhasil dihapus!');
    }


    public function confirm($id)
    {
        $bukti = BuktiTantangan::findOrFail($id);

        // Update is_claimed menjadi 1 dan status menjadi terkonfirmasi
        $bukti->status = 'completed';
        $bukti->save();

        return redirect()->route('Admin.konfir_bukti.index')->with('success', 'Bukti tantangan berhasil dikonfirmasi!');
    }

    // public function konfirmasi($id)
    // {
    //     $bukti = BuktiTantangan::findOrFail($id);
    //     $bukti->challenge_status = 'submitted';
    //     $bukti->save();

    //     return redirect()->route('Admin.konfir_bukti.index'); // penting: redirect ke controller yg ambil data terbaru
    // }

}
