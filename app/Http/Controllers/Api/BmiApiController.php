<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BMIUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BmiApiController extends Controller
{
    // Tampilkan semua data BMI user yang login
    public function index()
    {
        $data = BMIUser::where('user_id', Auth::id())->get();
        return response()->json($data);
    }

    // Tampilkan data BMI spesifik
    public function show($id)
    {
        $data = BMIUser::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($data);
    }

    // Create (POST)
    public function store(Request $request)
    {
        $request->validate([
            'berat' => 'required|numeric|min:1',
            'tinggi' => 'required|numeric|min:1',
            'jenis_kelamin' => 'required|in:P,L',
            'usia' => 'required|integer|min:1',
        ]);

        $berat = $request->berat;
        $tinggi = $request->tinggi / 100; // cm ke meter
        $bmi = $berat / ($tinggi * $tinggi);

        $kategori = $this->getBMICategory($bmi);
        $beratIdeal = $this->hitungBeratIdeal($tinggi);
        $saran = $this->generateSaran($kategori);

        $bmiUser = BMIUser::create([
            'user_id' => Auth::id(),
            'berat' => $berat,
            'tinggi' => $request->tinggi,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'bmi' => round($bmi, 2),
            'kategori' => $kategori,
            'berat_ideal' => $beratIdeal,
            'saran' => $saran
        ]);

        return response()->json([
        'message' => 'Data BMI berhasil dibuat.',
        'data' => $bmiUser
        ], 201);

    }

    // Update data BMI by id
    // 
    
     public function update(Request $request, $id)
    {
        // Temukan record BMI yang terkait dengan user yang login
        $bmiUser = BMIUser::where('user_id', Auth::id())->find($id);

        // Check if the user has access to the record
        if (!$bmiUser) {
            return response()->json([
                'message' => 'Data BMI tidak ditemukan untuk pengguna ini.',
            ], 404);
        }

        // Log the data before the update
        Log::info('Before Update:', [
            'user_id' => Auth::id(),
            'berat' => $bmiUser->berat,
            'tinggi' => $bmiUser->tinggi,
            'jenis_kelamin' => $bmiUser->jenis_kelamin,
            'usia' => $bmiUser->usia,
        ]);

        // Validasi input yang ada di request
        $request->validate([
            'berat' => 'sometimes|numeric|min:1',
            'tinggi' => 'sometimes|numeric|min:1',
            'jenis_kelamin' => 'sometimes|in:P,L',
            'usia' => 'sometimes|integer|min:1',
        ]);

        // Ambil data yang ada di request atau gunakan data yang ada di database jika tidak ada perubahan
        $berat = $request->input('berat', $bmiUser->berat);
        $tinggi = $request->input('tinggi', $bmiUser->tinggi) / 100;  // cm ke meter

        // Lakukan perhitungan BMI
        $bmi = $berat / ($tinggi * $tinggi);
        $kategori = $this->getBMICategory($bmi);
        $beratIdeal = $this->hitungBeratIdeal($tinggi);
        $saran = $this->generateSaran($kategori);

        // Perbarui data BMI di database
        $bmiUser->update([
            'berat' => $berat,
            'tinggi' => $tinggi * 100,  // Kembalikan ke cm
            'jenis_kelamin' => $request->jenis_kelamin ?? $bmiUser->jenis_kelamin,
            'usia' => $request->usia ?? $bmiUser->usia,
            'bmi' => round($bmi, 2),
            'kategori' => $kategori,
            'berat_ideal' => $beratIdeal,
            'saran' => $saran
        ]);

        // Log the data after the update
        Log::info('After Update:', $bmiUser->toArray());

        // Refresh the model to get the updated data
        $bmiUser->refresh();

        // Kembalikan respon JSON dengan data yang sudah diperbarui
        return response()->json([
            'message' => 'Data BMI berhasil diperbarui.',
            'data' => $bmiUser
        ], 200);
    }


    // Hapus data BMI
    public function destroy($id)
    {
        $bmiUser = BMIUser::where('user_id', Auth::id())->findOrFail($id);
        $bmiUser->delete();

        return response()->json([
        'message' => 'Data BMI berhasil dihapus.'
    ], 200);

    }

    private function getBMICategory($bmi)
    {
        if ($bmi < 18.5) return 'Kurus';
        if ($bmi >= 18.5 && $bmi <= 24.9) return 'Normal';
        if ($bmi >= 25 && $bmi <= 29.9) return 'Kelebihan Berat Badan';
        return 'Obesitas';
    }

    // Helper berat ideal
    private function hitungBeratIdeal($tinggi)
    {
        return round(22 * ($tinggi * $tinggi), 1);
    }

    // Helper generate saran
    private function generateSaran($kategori)
    {
        return match ($kategori) {
            'Kurus' => 'Tingkatkan asupan kalori dan olahraga kekuatan.',
            'Normal' => 'Pertahankan pola makan dan aktivitas fisik Anda.',
            'Kelebihan Berat Badan' => 'Kurangi kalori dan tingkatkan aktivitas fisik.',
            'Obesitas' => 'Konsultasikan dengan dokter atau ahli gizi.',
            default => '-',
        };
    }
}