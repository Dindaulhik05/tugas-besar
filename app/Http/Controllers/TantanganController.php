<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuktiTantangan;
use App\Models\Tantangan;
use Illuminate\Support\Facades\Auth;

class TantanganController extends Controller
{
    public function showChallenges()
    {
        $userId = Auth::id(); // pastikan user login

        $now = now();
        // Ambil semua tantangan dan status user (left join manual)
        $challengesData = Tantangan::where('tanggal_mulai', '<=', $now)
        ->where('tanggal_selesai', '>=', $now)
        ->leftJoin('challenge_submissions', function ($join) use ($userId) {
            $join->on('challenges.id', '=', 'challenge_submissions.challenge_id')
                 ->where('challenge_submissions.user_id', '=', $userId);
        })
        ->select('challenges.*', 'challenge_submissions.challenge_status')
        ->distinct()
        ->get();

        return view('tantangan', compact('challengesData'));
    }

    public function showDetail($id)
    {
        $userId = Auth::id();
        $challenge = Tantangan::findOrFail($id);
        $existingUpload = BuktiTantangan::where('user_id', $userId)
                        ->where('challenge_id', $id)
                        ->first();

                        return view('detail_tantangan', compact('challenge', 'existingUpload'))
                        ->with('success', 'Tantangan berhasil diselesaikan!');                 
    }


    public function submitBukti(Request $request, $id)
    {
        $challenge = Tantangan::findOrFail($id);
        $now = now();

        if ($now->lt($challenge->tanggal_mulai) || $now->gt($challenge->tanggal_selesai)) {
            return back()->with('error', 'Tantangan ini hanya bisa dikerjakan pada periode yang ditentukan.');
        }

        $request->validate([
            'file_path' => 'required|file|mimes:jpg,jpeg,png,pdf,mp4|max:5120' // max 5MB
        ]);

        $userId = Auth::id();
        $filePath = $request->file('file_path')->store('uploads', 'public');

        BuktiTantangan::updateOrCreate(
            ['user_id' => $userId, 'challenge_id' => $id],
            [
                'challenge_status' => 'submitted',
                'file_path' => $filePath
            ]
        );

        return redirect()->route('tantangan.detail', ['id' => $id])
                 ->with('success', 'Tantangan berhasil diselesaikan!');

    }
}    

