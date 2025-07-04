@extends('layouts.sidebarUser')

@section('title', 'Cek BMR')

@section('content')
<div class="flex flex-col min-h-screen">
    <div id="mainContent" class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold hidden md:block">Cek BMR</h1>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Notification -->
                    <div class="relative">
                        <button id="notificationBtn" class="p-2 bg-[#578669] rounded-full shadow-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                        </button>
                    
                        <!-- Notification Popout -->
                        <div id="notificationPopout" class="hidden absolute right-0 top-full mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2">Notifikasi</h3>
                                <div class="space-y-2">
                                    <div class="bg-gray-100 p-2 rounded">
                                        <p class="text-sm">Selesai Melakukan Yoga</p>
                                        <span class="text-xs text-gray-500">2 minutes ago</span>
                                    </div>
                                    <div class="bg-gray-100 p-2 rounded">
                                        <p class="text-sm">Mendapatkan Poin dari Workout</p>
                                        <span class="text-xs text-gray-500">9 hour ago</span>
                                    </div>
                                    <div class="bg-gray-100 p-2 rounded">
                                        <p class="text-sm">Berhasil Klaim Poin</p>
                                        <span class="text-xs text-gray-500">3 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    
                    <!-- Settings Button -->
                    <div class="relative">
                        <button id="settingsBtn" class="p-2 bg-[#578669] rounded-full shadow-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <!-- Profile Popout -->
                        <div id="profilePopout" class="hidden absolute right-0 top-full mt-2 w-60 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                            <div class="p-5 space-y-3">
                                <h3 class="text-xl font-bold mb-2">Setting</h3>
                                
                                <!-- Profile Button -->
                                <button id="profileBtn" class="w-full bg-gray-100 text-black py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                                    Profile
                                </button>

                                <!-- Logout Button -->
                                <button id="logoutBtn" class="w-full bg-gray-100 text-red-500 py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                                    Keluar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

<div class="container mx-auto">
    <div class="bg-white p-8 rounded-lg shadow-xl mx-auto">

        <!-- Formulir Pengguna -->
        <form method="POST" action="{{ route('kesehatan.calculateBmr') }}" class="space-y-8">
            @csrf

            <div class="flex justify-center space-x-8 mb-6">
                <!-- Laki-laki -->
                <div>
                    <input type="radio" name="gender" value="male" id="pria" class="hidden peer" required>
                    <label for="pria" class="flex flex-col items-center cursor-pointer transition-transform duration-300 peer-checked:scale-110 peer-checked:-translate-y-2">
                        <div class="w-20 h-20 rounded-full bg-indigo-200 flex items-center justify-center transition-all duration-300 
                            peer-checked:bg-blue-400 peer-checked:ring-4 peer-checked:ring-blue-600">
                            <img src="https://cdn-icons-png.flaticon.com/512/2922/2922510.png" alt="Laki-laki" class="w-14 h-14 transition-all duration-300 
                                peer-checked:w-16 peer-checked:h-16">
                        </div>
                        <span class="mt-2 text-gray-600 text-lg font-semibold transition-all duration-300 peer-checked:text-blue-600 peer-checked:text-xl">
                            Laki-laki
                        </span>
                    </label>
                </div>

                <!-- Perempuan -->
                <div>
                    <input type="radio" name="gender" value="female" id="wanita" class="hidden peer" required>
                    <label for="wanita" class="flex flex-col items-center cursor-pointer transition-transform duration-300 peer-checked:scale-110 peer-checked:-translate-y-2">
                        <div class="w-20 h-20 rounded-full bg-pink-200 flex items-center justify-center transition-all duration-300 
                            peer-checked:bg-pink-400 peer-checked:ring-4 peer-checked:ring-pink-600">
                            <img src="https://cdn-icons-png.flaticon.com/512/2922/2922565.png" alt="Perempuan" class="w-14 h-14 transition-all duration-300 
                                peer-checked:w-16 peer-checked:h-16">
                        </div>
                        <span class="mt-2 text-gray-600 text-lg font-semibold transition-all duration-300 peer-checked:text-pink-600 peer-checked:text-xl">
                            Perempuan
                        </span>
                    </label>
                </div>
            </div>

            <!-- Berat Badan -->
            <div class="mb-6 bg-green-50 p-6 rounded-lg shadow-md">
                <label for="weight" class="block text-md font-medium text-green-700">Berat Badan (kg):</label>
                <input type="number" name="weight" id="weight" step="0.1" class="w-full p-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-md" required>
            </div>

            <!-- Tinggi Badan -->
            <div class="mb-6 bg-green-50 p-6 rounded-lg shadow-md">
                <label for="height" class="block text-md font-medium text-green-700">Tinggi Badan (cm):</label>
                <input type="number" name="height" id="height" step="0.1" class="w-full p-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-md" required>
            </div>

            <!-- Usia -->
            <div class="mb-6 bg-green-50 p-6 rounded-lg shadow-md">
                <label for="age" class="block text-md font-medium text-green-700">Usia (tahun):</label>
                <input type="number" name="age" id="age" class="w-full p-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-md" required>
            </div>

            <!-- Tingkat Aktivitas -->
            <div class="mb-6 bg-green-50 p-6 rounded-lg shadow-md">
                <label for="activityLevel" class="block text-md font-medium text-green-700">Tingkat Aktivitas:</label>
                <select name="activityLevel" id="activityLevel" class="w-full p-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-md" required>
                    <option value="" disabled selected hidden>Pilih Tingkat Aktivitas</option>
                    <option value="sangat_sedikit">Sangat sedikit aktif</option>
                    <option value="ringan">Sedikit aktif</option>
                    <option value="sedang">Cukup aktif</option>
                    <option value="sangat_aktif">Sangat aktif</option>
                    <option value="ekstra_aktif">Ekstra aktif</option>
                </select>
            </div>

            <!-- Tujuan Kalori -->
            <div class="mb-6 bg-green-50 p-6 rounded-lg shadow-md">
                <label for="goal" class="block text-md font-medium text-green-700">Tujuan Kalori:</label>
                <select name="goal" id="goal" class="w-full p-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-md" required>
                    <option value="" disabled selected hidden>Pilih Tujuan Kalori</option>
                    <option value="menurunkan">Menurunkan berat badan</option>
                    <option value="menaikkan">Menaikkan berat badan</option>
                    <option value="menjaga">Menjaga berat badan</option>
                </select>
            </div>

            <div class="flex justify-center space-x-4">
                <a href="{{ route('kesehatan.index') }}" class="px-6 py-2 bg-gray-400 text-white font-semibold rounded-lg hover:bg-gray-700 transition ease-in-out duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>

                <button type="submit" class="px-6 py-2 bg-[#578669] text-white font-semibold rounded-lg hover:bg-green-700 transition ease-in-out duration-300 flex items-center">
                    <i class="fas fa-calculator mr-2"></i> Hitung BMR
                </button>
            </div>
        </form>

        <div class="container mx-auto p-8">
    <!-- <div class="bg-white p-8 rounded-lg shadow-xl mx-auto"> -->
        

        <!-- Menampilkan Hasil BMR -->
        @if(session('bmr'))
            <div class="mt-8 p-6 bg-green-100 text-green-800 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-bold mb-4">Hasil BMR Anda</h2>
                <p><strong>BMR Anda:</strong> {{ session('bmr') }} kalori/hari</p>
                <p><strong>TDEE Anda:</strong> {{ session('tdee') }} kalori/hari</p>
                <p><strong>Target Kalori:</strong> {{ session('targetCalories') }} kalori/hari</p>
            </div>
        @endif
    </div>
</div>


    <!-- Disclaimer -->
    <div class="mt-6 p-5 bg-yellow-100 text-yellow-800 rounded-lg shadow-md">
        <strong>Disclaimer:</strong> Kalkulator ini hanya untuk informasi umum. Tidak untuk diagnosis medis. Untuk keperluan medis, konsultasikan ke dokter.
    </div>
</div>

<!-- Enhanced BMR History Section -->
<div class="bg-gradient-to-br from-white to-orange-50 p-8 rounded-2xl shadow-2xl mx-auto mt-8 border border-orange-100">
    <div class="flex items-center justify-center mb-8">
        <!-- <div class="bg-gradient-to-r from-orange-500 to-red-600 p-3 rounded-full mr-4 shadow-lg">
            <i class="fas fa-fire text-white text-xl"></i>
        </div> -->
        <h2 class="text-2xl font-bold text-gray-800  bg-black bg-clip-text text-transparent">
            Riwayat BMR Anda
        </h2>
    </div>

    @if($bmrResults->isEmpty())
        <div class="text-center py-16">
            <!-- <div class="bg-gradient-to-r from-orange-400 to-red-500 p-4 rounded-full w-20 h-20 mx-auto mb-6 flex items-center justify-center shadow-lg">
                <i class="fas fa-fire text-white text-2xl"></i>
            </div> -->
            <p class="text-gray-600 text-lg font-medium">Belum ada riwayat BMR yang dihitung.</p>
            <p class="text-gray-500 text-sm mt-2">Mulai hitung BMR Anda untuk melihat riwayat di sini!</p>
        </div>
    @else
        <div class="overflow-x-auto rounded-xl shadow-inner bg-white">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gradient-to-r from-green-600 to-emerald-600 text-white">
                        <th class="px-6 py-4 text-left font-semibold rounded-tl-xl">
                            <i class="fas fa-calendar-alt mr-2"></i>Tanggal
                        </th>
                        <th class="px-6 py-4 text-left font-semibold">
                            <i class="fas fa-weight mr-2"></i>Berat Badan
                        </th>
                        <th class="px-6 py-4 text-left font-semibold">
                            <i class="fas fa-ruler-vertical mr-2"></i>Tinggi Badan
                        </th>
                        <th class="px-6 py-4 text-left font-semibold">
                            <i class="fas fa-birthday-cake mr-2"></i>Usia
                        </th>
                        <th class="px-6 py-4 text-left font-semibold">
                            <i class="fas fa-fire mr-2"></i>BMR
                        </th>
                        <th class="px-6 py-4 text-left font-semibold">
                            <i class="fas fa-running mr-2"></i>TDEE
                        </th>
                        <th class="px-6 py-4 text-left font-semibold rounded-tr-xl">
                            <i class="fas fa-bullseye mr-2"></i>Target Kalori
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($bmrResults as $index => $history)
                        <tr class="hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 transition-all duration-300 transform hover:scale-[1.01] {{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="px-6 py-4 text-gray-700 font-medium">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                    {{ $history->created_at->format('d-m-Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $history->berat_badan }} kg
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $history->tinggi_badan }} cm
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $history->usia }} tahun
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                <div class="flex items-center">
                                    <div class="w-16 h-12 rounded-lg bg-gradient-to-r from-orange-400 to-red-500 flex items-center justify-center text-white font-bold text-xs shadow-md">
                                        {{ $history->bmr }}
                                    </div>
                                    <span class="ml-2 text-xs text-gray-500">kalori/hari</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                <div class="flex items-center">
                                    <div class="w-16 h-12 rounded-lg bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold text-xs shadow-md">
                                        {{ $history->tdee }}
                                    </div>
                                    <span class="ml-2 text-xs text-gray-500">kalori/hari</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                <div class="flex items-center">
                                    <div class="w-16 h-12 rounded-lg bg-gradient-to-r from-red-400 to-pink-500 flex items-center justify-center text-white font-bold text-xs shadow-md">
                                        {{ $history->target_kalori }}
                                    </div>
                                    <span class="ml-2 text-xs text-gray-500">kalori/hari</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Summary Statistics -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-gradient-to-r from-green-400 to-emerald-600 p-4 rounded-xl text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm">Total Pengukuran</p>
                        <p class="text-2xl font-bold">{{ $bmrResults->count() }}</p>
                    </div>
                    <i class="fas fa-chart-bar text-3xl text-green-200"></i>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-blue-400 to-cyan-600 p-4 rounded-xl text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm">BMR Terakhir</p>
                        <p class="text-xl font-bold">{{ number_format($bmrResults->first()->bmr ?? 0, 1) }} <span class="text-sm">kal</span></p>
                    </div>
                    <i class="fas fa-fire text-3xl text-blue-200"></i>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-purple-400 to-indigo-600 p-4 rounded-xl text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm">TDEE Terakhir</p>
                        <p class="text-xl font-bold">{{ number_format($bmrResults->first()->tdee ?? 0, 1) }} <span class="text-sm">kal</span></p>
                    </div>
                    <i class="fas fa-running text-3xl text-purple-200"></i>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-pink-400 to-red-600 p-4 rounded-xl text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-pink-100 text-sm">Target Kalori</p>
                        <p class="text-xl font-bold">{{ number_format($bmrResults->first()->target_kalori ?? 0, 1) }} <span class="text-sm">kal</span></p>
                    </div>
                    <i class="fas fa-bullseye text-3xl text-pink-200"></i>
                </div>
            </div>
        </div>
    @endif
</div>


        </div>
    </div> 
</div> 
@include('layouts.footerUser')      
@endsection