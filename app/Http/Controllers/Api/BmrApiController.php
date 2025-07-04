<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BMRUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BmrApiController extends Controller
{
    // Tampilkan semua hasil BMR pengguna
    public function index()
    {
        $data = BMRUser::where('user_id', Auth::id())->get();
        return response()->json($data);
    }

    // Tampilkan hasil BMR spesifik
    public function show($id)
    {
        $data = BMRUser::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($data);
    }

    // Store data BMR
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'jenis_kelamin' => 'required|in:P,L',  // P = Pria, L = Wanita
            'berat' => 'required|numeric|min:1',
            'tinggi' => 'required|numeric|min:1',
            'usia' => 'required|numeric|min:1',
            'tingkat_aktivitas' => 'required|in:sangat_sedikit,ringan,sedang,sangat_aktif,ekstra_aktif',
            'tujuan' => 'required|in:menurunkan,menaikkan,menjaga',
        ]);

        // Ambil data dari request
        $gender = $request->jenis_kelamin;
        $weight = $request->berat;
        $height = $request->tinggi;
        $age = $request->usia;
        $activityLevel = $request->tingkat_aktivitas;
        $goal = $request->tujuan;

        // Perhitungan BMR, TDEE dan target kalori
        $bmr = $this->calculateBMRFormula($gender, $weight, $height, $age);
        $tdee = $this->calculateTDEE($bmr, $activityLevel);
        $targetCalories = $this->adjustCalories($tdee, $goal);

        // Simpan data ke database
        $result = BMRUser::create([
            'user_id' => Auth::id(),
            'jenis_kelamin' => $gender,
            'berat_badan' => $weight,
            'tinggi_badan' => $height,
            'usia' => $age,
            'tingkat_aktivitas' => $activityLevel,
            'tujuan_kalori' => $goal,
            'bmr' => $bmr,
            'tdee' => $tdee,
            'target_kalori' => $targetCalories,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data BMR berhasil disimpan.',
            'data' => [
                'bmr' => round($bmr, 2),
                'tdee' => round($tdee, 2),
                'target_calories' => round($targetCalories, 2),
                'user_id' => $result->user_id
            ]
        ], 201);
    }

    // Update data BMR
    public function update(Request $request, $id)
    {
        $result = BMRUser::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'jenis_kelamin' => 'sometimes|in:P,L',
            'berat' => 'sometimes|numeric|min:1',
            'tinggi' => 'sometimes|numeric|min:1',
            'usia' => 'sometimes|numeric|min:1',
            'tingkat_aktivitas' => 'sometimes|in:sangat_sedikit,ringan,sedang,sangat_aktif,ekstra_aktif',
            'tujuan' => 'sometimes|in:menurunkan,menaikkan,menjaga',
        ]);

        // Perhitungan ulang BMR, TDEE dan target kalori jika ada perubahan data
        $gender = $request->jenis_kelamin ?? $result->jenis_kelamin;
        $weight = $request->berat ?? $result->berat_badan;
        $height = $request->tinggi ?? $result->tinggi_badan;
        $age = $request->usia ?? $result->usia;
        $activityLevel = $request->tingkat_aktivitas ?? $result->tingkat_aktivitas;
        $goal = $request->tujuan ?? $result->tujuan_kalori;

        $bmr = $this->calculateBMRFormula($gender, $weight, $height, $age);
        $tdee = $this->calculateTDEE($bmr, $activityLevel);
        $targetCalories = $this->adjustCalories($tdee, $goal);

        // Update data
        $result->update([
            'jenis_kelamin' => $gender,
            'berat_badan' => $weight,
            'tinggi_badan' => $height,
            'usia' => $age,
            'tingkat_aktivitas' => $activityLevel,
            'tujuan_kalori' => $goal,
            'bmr' => $bmr,
            'tdee' => $tdee,
            'target_kalori' => $targetCalories,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data BMR berhasil diupdate.',
            'data' => $result
        ], 200);
    }

    // Hapus data BMR
    public function destroy($id)
    {
        $result = BMRUser::where('user_id', Auth::id())->findOrFail($id);
        $result->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data BMR berhasil dihapus.'
        ], 200);
    }

    // Fungsi untuk menghitung BMR
    private function calculateBMRFormula($gender, $weight, $height, $age)
    {
        if ($gender == "P") {
            return 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
        } elseif ($gender == "L") {
            return 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
        }
        return null;
    }

    // Fungsi untuk menghitung TDEE
    private function calculateTDEE($bmr, $activityLevel)
    {
        $activityFactors = [
            "sangat_sedikit" => 1.2,
            "ringan" => 1.375,
            "sedang" => 1.55,
            "sangat_aktif" => 1.725,
            "ekstra_aktif" => 1.9
        ];
        return $bmr * ($activityFactors[$activityLevel] ?? 1);
    }

    // Fungsi untuk menyesuaikan kalori berdasarkan tujuan
    private function adjustCalories($tdee, $goal)
    {
        if ($goal == "menurunkan") {
            return $tdee - 500; // Defisit 500 kalori
        } elseif ($goal == "menaikkan") {
            return $tdee + 300; // Surplus 300 kalori
        }
        return $tdee; // Menjaga berat badan
    }
}
