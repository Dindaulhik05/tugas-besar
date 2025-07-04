<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Olahraga;
use App\Models\UserOlahraga;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OlahragaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query pencarian
        $search = $request->input('search');

        // Query daftar olahraga
        $olahragas = Olahraga::query();

        if ($search) {
            $olahragas->where(function($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        $olahragas = $olahragas->orderBy('nama')->paginate(9); // tampil 9 per halaman

        return view('Olahraga.olahraga', compact('olahragas'));
    }

    public function show($id)
    {
        $olahraga = Olahraga::findOrFail($id);

        return view('Olahraga.detail_olahraga', compact('olahraga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'olahraga_id' => 'required|exists:olahraga,id',
        ]);

        UserOlahraga::create([
            'user_id' => Auth::id(),
            'olahraga_id' => $request->olahraga_id,
            'waktu_olahraga' => Carbon::now('Asia/Jakarta'),
        ]);

        return redirect()->route('olahraga.index')->with('success', 'Anda telah berhasil melakukan olahraga berbasis video!');
    }

    public function riwayatOlahraga()
    {
        $riwayatOlahraga = UserOlahraga::where('user_id', Auth::id())->paginate(9);
        return view('Olahraga.riwayat_olahraga', compact('riwayatOlahraga'));
    }

    public function destroy($id)
    {
        // Temukan riwayat olahraga berdasarkan ID
        $riwayatOlahraga = UserOlahraga::find($id);

        // Periksa apakah riwayat olahraga ada
        if ($riwayatOlahraga) {
            // Hapus data
            $riwayatOlahraga->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('riwayat.olahraga')->with('success', 'Riwayat olahraga berhasil dihapus.');
        }

        // Jika tidak ditemukan
        return redirect()->route('Olahraga.riwayat_olahraga')->with('error', 'Riwayat olahraga tidak ditemukan.');
    }

}