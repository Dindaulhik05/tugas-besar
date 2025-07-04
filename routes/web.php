<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaOlahragaController;
use App\Http\Controllers\KelolaTantangan;
use App\Http\Controllers\KonfirBuktiController;
use App\Http\Controllers\TantanganController;
use App\Http\Controllers\KelolaTantanganController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\HadiahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserHadiahController;
use App\Http\Controllers\CekKesehatanController;
use App\Http\Controllers\KlaimPoin;
use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\FaqController;

//landing page
Route::get('/LANDPAGE/landingpage', function () {
    return view('LANDPAGE.landingpage');
})->name('landingpage');

Route::get('/LANDPAGE/about', function () {
    return view('LANDPAGE.about');
})->name('about');

Route::get('/LANDPAGE/contactUs', function () {
    return view('LANDPAGE.contactUs');
})->name('contactUs');


// register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Pengguna
// Dashboard untuk pengguna biasa
Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
Route::post('/dashboard/hitung-bmi', [DashboardController::class, 'hitungBMI'])->name('dashboard.bmi');

//tantangan pengguna
Route::get('/tantangan', [TantanganController::class, 'showChallenges'])->name('tantangan');
Route::get('/tantangan/{id}', [TantanganController::class, 'showDetail'])->name('tantangan.detail');
Route::post('/tantangan/{id}/submit-bukti', [TantanganController::class, 'submitBukti'])->name('tantangan.submit.bukti');

//BMI pengguna
// Route::get('/bmi', [BMIController::class, 'form'])->name('user.bmi');
// Route::post('/bmi', [BMIController::class, 'bmi'])->name('user.bmi.store');

//HADIAH
Route::get('/user-hadiah', [UserHadiahController::class, 'index'])->name('user_hadiah.index');

// Route untuk menukar hadiah
Route::post('/user-hadiah/tukar/{hadiah}', [UserHadiahController::class, 'tukar'])->name('user_hadiah.tukar');

// Route untuk menampilkan daftar hadiah dari HadiahController (sepertinya ini rute yang terpisah)
Route::get('/hadiah', [HadiahController::class, 'index'])->name('hadiah.index');  // Display list of hadiah

// Route untuk menangani konfirmasi (jika ada)
Route::post('/confirm', [HadiahController::class, 'submitConfirmation'])->name('confirm.submit');  // Handle form submission

// Rute untuk halaman tukar klaim
Route::get('/tukar-klaim', [UserHadiahController::class, 'index'])->name('user_hadiah.index');

// Rute untuk menampilkan daftar hadiah
Route::get('/user-hadiah', [UserHadiahController::class, 'daftarHadiah'])->name('user_hadiah.daftar');

// Rute untuk menukar hadiah
Route::post('/user-hadiah/tukar/{hadiah}', [UserHadiahController::class, 'tukar'])->name('user_hadiah.tukar');



// Route untuk halaman edit profil pengguna yang sedang login
Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Route untuk update profil pengguna yang sedang login
Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');

// Menampilkan halaman utama
Route::get('/kesehatan', [CekKesehatanController::class, 'index'])->name('kesehatan.index');

// Menampilkan formulir BMI
Route::get('/bmi', [CekKesehatanController::class, 'showBmiForm'])->name('kesehatan.bmi');

// Menghitung BMI
Route::post('/bmi', [CekKesehatanController::class, 'calculateBmi'])->name('kesehatan.calculateBmi');

// Menampilkan formulir BMR
Route::get('/bmr', [CekKesehatanController::class, 'showBmrForm'])->name('kesehatan.bmr');

//user olahraga
Route::get('/olahraga', [OlahragaController::class, 'index'])->name('olahraga.index'); 
Route::get('/olahraga/{id}', [OlahragaController::class, 'show'])->name('detail_olahraga.show');
Route::post('/aktivitas/selesai', [OlahragaController::class, 'store'])->name('aktivitas.store');

// Menghitung BMR
Route::post('/bmr', [CekKesehatanController::class, 'calculateBmr'])->name('kesehatan.calculateBmr');

//klaim poin
Route::get('/klaim-poin', [KlaimPoin::class, 'index'])->name('klaim.index');
Route::post('/klaim poin/{id}', [KlaimPoin::class, 'klaim'])->name('klaim.poin');

//user olahraga
Route::get('/olahraga', [OlahragaController::class, 'index'])->name('olahraga.index'); 
Route::get('/olahraga/{id}', [OlahragaController::class, 'show'])->name('detail_olahraga.show');
Route::post('/aktivitas/selesai', [OlahragaController::class, 'store'])->name('aktivitas.store');
Route::get('riwayat-olahraga', [OlahragaController::class, 'riwayatOlahraga'])->name('riwayat.olahraga');
Route::delete('/riwayat-olahraga/{id}', [OlahragaController::class, 'destroy'])->name('riwayatOlahraga.destroy');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

//ADMIN
//profile
// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile-admin', [ProfileAdminController::class, 'index'])->name('Admin.profile.index');
//     Route::get('/profile-admin/edit', [ProfileAdminController::class, 'edit'])->name('Admin.profile.edit');
//     Route::post('/profile-admin/update', [ProfileAdminController::class, 'update'])->name('Admin.profile.update');
// });

Route::get('/admin/profile', [ProfileAdminController::class, 'index'])->name('admin.profile.index');
Route::get('/admin/profile/edit', [ProfileAdminController::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [ProfileAdminController::class, 'update'])->name('admin.profile.update');


// Route::get('/profile-admin', [ProfileAdminController::class, 'index'])->name('Admin.profile.index'); // Menampilkan profile
// Route::get('/profile-admin/{id}/edit', [ProfileAdminController::class, 'edit'])->name('Admin.profile.edit');
// Route::put('/profile/{id}', [ProfileAdminController::class, 'update'])->name('Admin.profile.update'); // Update profile

// Dashboard untuk admin
Route::get('/admin-dashboard', [DashboardController::class, 'AdminDashboard'])->name('Admin.dashboard');

// Konfirmasi Bukti Tantangan
Route::get('/admin/bukti-tantangan', [KonfirBuktiController::class, 'index'])->name('Admin.konfir_bukti.index');
Route::get('/admin/bukti-tantangan/create', [KonfirBuktiController::class, 'create'])->name('Admin.konfir_bukti.create');
Route::post('/admin/bukti-tantangan', [KonfirBuktiController::class, 'store'])->name('Admin.konfir_bukti.store');
Route::get('/admin/bukti-tantangan/{id}/edit', [KonfirBuktiController::class, 'edit'])->name('Admin.konfir_bukti.edit');
Route::patch('/admin/bukti-tantangan/{id}', [KonfirBuktiController::class, 'update'])->name('Admin.konfir_bukti.update');
Route::delete('/admin/bukti-tantangan/{id}', [KonfirBuktiController::class, 'delete'])->name('Admin.konfir_bukti.delete');
Route::patch('/admin/bukti-tantangan/{id}/confirm', [KonfirBuktiController::class, 'confirm'])->name('Admin.konfir_bukti.confirm');

//kelola tantangan
Route::get('/kelola-tantangan', [KelolaTantanganController::class, 'index'])->name('kelola_tantangan.index');
Route::get('/kelola-tantangan/create', [KelolaTantanganController::class, 'create'])->name('kelola_tantangan.create');
Route::post('/kelola-tantangan', [KelolaTantanganController::class, 'store'])->name('kelola_tantangan.store');
Route::get('/kelola-tantangan/{id}/edit', [KelolaTantanganController::class, 'edit'])->name('kelola_tantangan.edit');
Route::put('/kelola-tantangan/{id}', [KelolaTantanganController::class, 'update'])->name('kelola_tantangan.update');
Route::delete('/kelola-tantangan/{id}', [KelolaTantanganController::class, 'destroy'])->name('kelola_tantangan.destroy');

//kelola olahraga
Route::get('/admin/olahraga', [KelolaOlahragaController::class, 'index'])->name('admin.olahraga.index');
Route::get('/olahraga/create', [KelolaOlahragaController::class, 'create'])->name('olahraga.create');
Route::post('/olahraga', [KelolaOlahragaController::class, 'store'])->name('olahraga.store');
Route::get('/olahraga/{id}/edit', [KelolaOlahragaController::class, 'edit'])->name('olahraga.edit');
Route::put('/olahraga/{id}', [KelolaOlahragaController::class, 'update'])->name('olahraga.update');
Route::delete('/olahraga/{id}', [KelolaOlahragaController::class, 'destroy'])->name('olahraga.destroy');

//kelola hadiah
Route::get('/hadiah', [HadiahController::class, 'index'])->name('hadiah.index');

// Route untuk form tambah hadiah
Route::get('/hadiah/create', [HadiahController::class, 'create'])->name('hadiah.create');

// Route untuk menyimpan hadiah baru
Route::post('/hadiah', [HadiahController::class, 'store'])->name('hadiah.store');

// Route untuk form edit hadiah
Route::get('/hadiah/{hadiah}/edit', [HadiahController::class, 'edit'])->name('hadiah.edit');

// Route untuk memperbarui hadiah
Route::put('/hadiah/{hadiah}', [HadiahController::class, 'update'])->name('hadiah.update');

// Route untuk menghapus hadiah
Route::delete('/hadiah/{hadiah}', [HadiahController::class, 'destroy'])->name('hadiah.destroy');
