<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuktiTantangan;
use App\Models\Tantangan;
use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KlaimPoin extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $challenges = DB::table('challenges')
            ->leftJoin('challenge_submissions', function ($join) use ($userId) {
                $join->on('challenges.id', '=', 'challenge_submissions.challenge_id')
                     ->where('challenge_submissions.user_id', '=', $userId);
            })
            ->select(
                'challenges.*',
                'challenge_submissions.status as submission_status',
                'challenge_submissions.challenge_status',
                'challenge_submissions.is_claimed',
                'challenge_submissions.id as submission_id'
            )
            ->where('challenges.tanggal_mulai', '<=', now())
            ->where('challenges.tanggal_selesai', '>=', now())
            ->get();
    
        $profile = ProfileUser::where('user_id', $userId)->first();
    
        return view('user_hadiah.klaim_poin', compact('challenges', 'profile'));
    }

    public function klaim($id)
    {
        $userId = Auth::id();

        $submission = BuktiTantangan::where('user_id', $userId)
            ->where('challenge_id', $id)
            ->where('challenge_status', 'submitted') // atau 'completed' sesuai logika kamu
            ->where('is_claimed', 0)
            ->first();

        if (!$submission) {
            return back()->with('error', 'Tantangan belum diselesaikan atau sudah diklaim.');
        }

        $challenge = Tantangan::findOrFail($id);
        $poin = $challenge->poin_tantangan;

        $profile = ProfileUser::where('user_id', $userId)->first();
        $profile->total_points += $poin;
        $profile->save();

        $submission->is_claimed = 1;
        $submission->save();

        return back()->with('message', 'Poin berhasil diklaim!');
    }
}
