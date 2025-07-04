<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hadiah;
use App\Models\PenukaranHadiah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Profile;  

class UserHadiahController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $profile = DB::table('profiles')->where('id', $userId)->first();
        $hadiahs = Hadiah::all();

        // Ambil daftar tantangan yang sesuai untuk user (misalnya, berdasarkan status atau lainnya)
        $challenges = DB::table('challenges') // Misalkan Anda memiliki tabel 'challenges'
            ->where('id', $userId) // Ambil tantangan yang sesuai dengan user (bisa sesuaikan dengan kondisi)
            ->get();

        return view('user_hadiah.index', compact('hadiahs', 'profile', 'challenges'));
    }

    // Menampilkan daftar hadiah untuk pengguna
    public function daftarHadiah()
    {
        $userId = Auth::id();
        $profile = DB::table('profiles')->where('id', $userId)->first();
        $hadiahs = Hadiah::all();

        return view('user_hadiah.daftar_hadiah', compact('hadiahs', 'profile'));
    }

    // Proses Penukaran Hadiah
    public function tukar(Request $request, $id)
{
    $userId = Auth::id();

    $profile = DB::table('profiles')->where('user_id', $userId)->first();
    if (!$profile) {
        return back()->with('error', 'Profil tidak ditemukan.');
    }

    $hadiah = Hadiah::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'address' => 'required|string',
    ]);

    if ($profile->total_points < $hadiah->points) {
        return back()->with('error', 'Poin tidak cukup.');
    }

    if ($hadiah->stok <= 0) {
        return back()->with('error', 'Stok hadiah habis.');
    }

    DB::beginTransaction();
    try {
        // Kurangi poin user
        DB::table('profiles')
            ->where('user_id', $userId)
            ->decrement('total_points', (int) $hadiah->points);

        // Kurangi stok hadiah
        $hadiah->decrement('stok', 1);

        // Simpan ke PenukaranHadiah
        PenukaranHadiah::create([
            'user_id' => $userId,
            'hadiah_id' => $hadiah->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'jml_tukar_poin' => $hadiah->points, // <-- Pastikan ini diisi poin hadiah
            'tanggal_penukaran' => now(),
        ]);

        DB::commit();

        // Ambil sisa poin user setelah update
        $profileAfter = DB::table('profiles')->where('user_id', $userId)->first();
        $sisaPoin = $profileAfter->total_points ?? 0;

        return back()->with('success', 'Penukaran hadiah berhasil! Sisa poin kamu: ' . $sisaPoin . ' poin.');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->with('error', 'Error: ' . $e->getMessage());
    }
}


}
