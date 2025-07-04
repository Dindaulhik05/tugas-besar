<?php

namespace App\Http\Controllers;

use App\Models\BuktiTantangan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProfileUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    // Dashboard untuk pengguna biasa
    public function userDashboard()
    {
        $user = Auth::user(); // This is also a valid way to retrieve the user
        // Check if the user exists
        if (!$user) {
            return redirect()->route('login');
        }

        $userId = $user->id;

        // Ambil total poin
        $totalPoints = DB::table('profiles')->where('id', $userId)->value('total_points');

        $kategori = DB::table('bmi_results')
        ->where('user_id', $user->id)
        ->orderByDesc('created_at')
        ->limit(1)
        ->value('kategori');

        $bmiHistory = DB::table('bmi_results')
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get(['bmi', 'kategori', 'created_at']);

        $tantanganSelesai = DB::table('challenge_submissions')
        ->where('user_id', $user->id)
        ->where('challenge_status', 'submitted')
        ->count();

        $tantanganSelesaiList = DB::table('challenge_submissions')
        ->join('challenges', 'challenge_submissions.challenge_id', '=', 'challenges.id')
        ->where('challenge_submissions.user_id', $user->id)
        ->where('challenge_submissions.challenge_status', 'submitted')
        ->select('challenges.no_tantangan', 'challenges.title', 'challenge_submissions.updated_at')
        ->orderBy('challenge_submissions.id', 'asc')
        ->get();


        // Ubah tanggal menjadi format string untuk grafik
        $labels = $bmiHistory->map(fn($item) => \Carbon\Carbon::parse($item->created_at)->format('d M Y'));
        $values = $bmiHistory->pluck('bmi');

        $hadiah = DB::table('hadiah')->limit(3)->get();

        return view('dashboard', compact('user', 'totalPoints', 'bmiHistory', 'kategori', 'tantanganSelesai', 'labels', 'values', 'hadiah', 'tantanganSelesai', 'tantanganSelesaiList')); // Sesuaikan dengan tampilan dashboard pengguna
    }

    
    // Dashboard untuk admin
    public function adminDashboard()
    {
        $user = Auth::user(); // This is also a valid way to retrieve the user
        // Check if the user exists
        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->is_admin !== 1) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
        // Menghitung total pengguna
        $total_users = User::count();
        
        // Menghitung pengguna yang aktif (misalnya, pengguna yang login dalam 30 hari terakhir)
        $total_active_users = User::where('last_login', '>=', now()->subDays(30))->count();

        $users = User::all();
        $buktiTantangan = BuktiTantangan::all();
        
        return view('Admin.dashboard', compact('total_users', 'total_active_users', 'users', 'user', 'buktiTantangan')); // Sesuaikan dengan tampilan dashboard admin
    }
}