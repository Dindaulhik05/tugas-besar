<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileAdminController extends Controller
{
    public function index()
    {
        $profile = ProfileAdmin::where('user_id', Auth::user()->id)->first();
        $user = Auth::user();
        return view('Admin.profile.index', compact('profile', 'user'));
    }

    public function edit()
    {
        $profile = ProfileAdmin::firstOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'name' => '',
                'bio' => '',
                'phone' => '',
                'gender' => 'L',
            ]
        );
        return view('Admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'gender' => 'required|in:L,P',
            'profile_pict' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = ProfileAdmin::where('user_id', Auth::user()->id)->first();

        if (!$profile) {
            abort(404);
        }

        $profile->name = $request->name;
        $profile->bio = $request->bio;
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;

        if ($request->hasFile('profile_pict')) {
            $path = $request->file('profile_pict')->store('profile_pictures', 'public');
            $profile->profile_pict = $path;
        }

        $profile->save();

        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
