<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ProfileUser;

class ProfileController extends Controller
{
    public function edit()
    {
        // Ambil profil berdasarkan user yang sedang login
        $profile = ProfileUser::where('user_id', Auth::id())->first();

        // Jika profil tidak ditemukan, bisa memberikan pesan error atau redirect
        if (!$profile) {
            return redirect()->route('profile.create')->with('error', 'Profile not found!');
        }

        return view('profile', compact('profile'));
    }

    // Update data profil untuk pengguna yang sedang login
    public function update(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required|string|max:255',
            'berat_badan' => 'required|string|max:50',
            'tinggi_badan' => 'required|integer',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string|max:20',
            'no_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'total_points' => 'nullable|integer',
        ]);

        // Ambil profil berdasarkan user yang sedang login
        $profile = ProfileUser::where('user_id', Auth::id())->firstOrFail();

        // Menangani upload gambar profile_picture
        if ($request->hasFile('profile_picture')) {
            // Menghapus gambar lama jika ada
            if ($profile->profile_picture && file_exists(public_path('uploads/profile_pictures/' . $profile->profile_picture))) {
                unlink(public_path('uploads/profile_pictures/' . $profile->profile_picture));
            }

            // Menyimpan gambar yang baru
            $file = $request->file('profile_picture');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile_pictures'), $fileName);
            $profile->profile_picture = $fileName;
        }

        // Update data profil
        $profile->update($request->except('profile_picture'));

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }

    // app/Http/Controllers/ProfileController.php
    public function create()
    {
        return view('create');
    }

}
