<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BMIUser;
use App\Models\BMRUser;
use Illuminate\Support\Facades\Auth;


class BMIController extends Controller
{
    
    // Menampilkan halaman utama untuk memilih BMI atau BMR
    public function index()
    {
        return view('kesehatan.index');
    }

    // Menampilkan formulir perhitungan BMI
    public function showBmiForm()
    {
        return view('kesehatan.bmi');
    }

    // Menampilkan formulir perhitungan BMR
    public function showBmrForm()
    {
        return view('kesehatan.bmr');
    }

    // Menghitung BMI dan menyimpan hasilnya
    public function calculateBmi(Request $request)
    {
        $request->validate([
            'berat' => 'required|numeric|min:1',
            'tinggi' => 'required|numeric|min:1',
            'jenis_kelamin' => 'required|in:P,L',
            'usia' => 'required|integer|min:1',
        ]);

        $berat = $request->berat;
        $tinggi = $request->tinggi / 100; // Ubah cm ke meter
        $bmi = $berat / ($tinggi * $tinggi);
        $kategori = $this->getBMICategory($bmi);
        $beratIdeal = $this->hitungBeratIdeal($tinggi);
        $saran = $this->generateSaran($kategori);

        BMIUser::create([
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

        return redirect()->route('kesehatan.bmi')
            ->with('berat', $berat)
            ->with('tinggi', $tinggi)
            ->with('bmi_result', round($bmi, 2))
            ->with('kategori', $kategori)
            ->with('berat_ideal', $beratIdeal)
            ->with('saran', $saran);
    }

    // Menghitung BMR dan menyimpan hasilnya
    public function calculateBmr(Request $request)
    {
        $request->validate([
            'gender' => 'required|in:pria,wanita', // Changed to match the form values
            'weight' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'age' => 'required|numeric|min:1',
            'activityLevel' => 'required|in:sangat_sedikit,ringan,sedang,sangat_aktif,ekstra_aktif',
            'goal' => 'required|in:menurunkan,menaikkan,menjaga',
        ]);

        // Ambil data dari form
        $gender = $request->gender; // Now directly use 'pria' or 'wanita'
        $weight = $request->weight;
        $height = $request->height;
        $age = $request->age;
        $activityLevel = $request->activityLevel;
        $goal = $request->goal;

        // Hitung BMR
        $bmr = $this->calculateBMRFormula($gender, $weight, $height, $age);
        // Hitung TDEE
        $tdee = $this->calculateTDEE($bmr, $activityLevel);
        // Hitung Target Kalori
        $targetCalories = $this->adjustCalories($tdee, $goal);

        // Simpan hasil perhitungan ke database
        BMRUser::create([
            'user_id' => Auth::id(),
            'jenis_kelamin' => $gender,  // This will be 'pria' or 'wanita'
            'berat_badan' => $weight,
            'tinggi_badan' => $height,
            'usia' => $age,
            'tingkat_aktivitas' => $activityLevel,
            'tujuan_kalori' => $goal,
            'bmr' => $bmr,
            'tdee' => $tdee,
            'target_kalori' => $targetCalories,
        ]);

        // Kirim hasil perhitungan ke view
        return redirect()->route('kesehatan.bmr')->with([
            'bmr' => round($bmr, 2),
            'tdee' => round($tdee, 2),
            'targetCalories' => round($targetCalories, 2),
            'weight' => $weight,
            'height' => $height,
            'age' => $age,
            'activityLevel' => $activityLevel,
            'goal' => $goal
        ]);
    }


    // Fungsi untuk menghitung kategori BMI
    private function getBMICategory($bmi)
    {
        if ($bmi < 18.5) {
            return 'Kurus';
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            return 'Normal';
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            return 'Kelebihan Berat Badan';
        } else {
            return 'Obesitas';
        }
    }

    // Fungsi untuk menghitung berat badan ideal berdasarkan tinggi badan
    private function hitungBeratIdeal($tinggi)
    {
        return round(22 * ($tinggi * $tinggi), 1); // BMI normal ideal 22
    }

    // Fungsi untuk menghasilkan saran berdasarkan kategori BMI
    private function generateSaran($kategori)
    {
        switch ($kategori) {
            case 'Kurus':
                return 'Tingkatkan asupan kalori dan olahraga kekuatan.';
            case 'Normal':
                return 'Pertahankan pola makan dan aktivitas fisik Anda.';
            case 'Kelebihan Berat Badan':
                return 'Kurangi kalori dan tingkatkan aktivitas fisik.';
            case 'Obesitas':
                return 'Konsultasikan dengan dokter atau ahli gizi.';
            default:
                return '-';
        }
    }

    // Fungsi untuk menghitung BMR
    private function calculateBMRFormula($gender, $weight, $height, $age)
    {
        if ($gender == "male") {
            return 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
        } elseif ($gender == "female") {
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