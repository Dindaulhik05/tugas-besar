<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserOlahraga;
use Illuminate\Support\Facades\Auth;

class UserOlahragaApiController extends Controller
{
    // List all olahraga for the authenticated user
    public function index()
    {
        $userId = Auth::id();

        // Mengambil semua data olahraga yang terkait dengan pengguna yang terautentikasi
        $data = UserOlahraga::with('olahraga') // Memuat relasi olahraga
            ->where('user_id', $userId) // Filter berdasarkan ID pengguna yang terautentikasi
            ->get(); // Ambil semua data

        // Mengembalikan response dalam format JSON
        return response()->json(['success' => true, 'data' => $data]);
    }

    // Show detail olahraga user
    public function show($id)
    {
        $userId = Auth::id(); // Mendapatkan ID pengguna yang terautentikasi
        $data = UserOlahraga::with('olahraga') // Memuat relasi olahraga
            ->where('user_id', $userId) // Memastikan hanya data yang terkait dengan pengguna yang terautentikasi
            ->findOrFail($id); // Mencari data berdasarkan ID, jika tidak ditemukan akan mengembalikan 404
        return response()->json(['success' => true, 'data' => $data]);
    }

    // Store new olahraga user
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'olahraga_id' => 'required|exists:olahraga,id', // Pastikan olahraga_id ada di tabel olahraga
        ]);

        // Menyimpan data olahraga untuk pengguna
        $userOlahraga = UserOlahraga::create([
            'user_id' => Auth::id(), // ID pengguna yang terautentikasi
            'olahraga_id' => $request->olahraga_id, // ID olahraga
            'tanggal' => now()->toDateString(), // Tanggal saat ini
            'waktu_melakukan' => now()->toTimeString(), // Waktu saat ini
            'waktu_olahraga' => now()->toDateTimeString(),
        ]);

        return response()->json(['success' => true, 'data' => $userOlahraga], 201); // Mengirimkan data yang berhasil disimpan
    }

    // Update olahraga user
    public function update(Request $request, $id)
    {
        // Mencari data berdasarkan ID dan memastikan data milik pengguna yang terautentikasi
        $userOlahraga = UserOlahraga::where('user_id', Auth::id())->findOrFail($id);

        // Validasi input
        $request->validate([
            'olahraga_id' => 'required|exists:olahraga,id', // Pastikan olahraga_id ada di tabel olahraga
        ]);

        // Memperbarui data
        $userOlahraga->olahraga_id = $request->olahraga_id; // Menyimpan olahraga_id baru
        $userOlahraga->tanggal = $request->input('tanggal', $userOlahraga->tanggal); // Mengubah tanggal jika ada
        $userOlahraga->waktu_melakukan = $request->input('waktu_melakukan', $userOlahraga->waktu_melakukan); // Mengubah waktu jika ada
        $userOlahraga->save(); // Menyimpan perubahan ke database

        return response()->json(['success' => true, 'data' => $userOlahraga]); // Mengirimkan data yang diperbarui
    }

    // Delete olahraga user
    public function destroy($id)
    {
        // Mencari data berdasarkan ID dan memastikan data milik pengguna yang terautentikasi
        $userOlahraga = UserOlahraga::where('user_id', Auth::id())->findOrFail($id);

        // Menghapus data olahraga
        $userOlahraga->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']); // Menyampaikan bahwa data berhasil dihapus
    }
}
