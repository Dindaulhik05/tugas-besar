@extends('layouts.sidebarUser')

@section('title', 'Cek BMI')

@section('content')
<div class="flex flex-col min-h-screen">
    <div id="mainContent" class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
            <!-- Header -->
        <div class="flex justify-between items-center mb-8"> 
            <div>
                <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Cek BMI</h1>
            </div>

            @include('layouts.notif_setting')
        </div>
        
            <div class="container mx-auto">
                <div class="bg-white p-8 rounded-lg shadow-xl mx-auto">

                    <form method="POST" action="{{ route('kesehatan.calculateBmi') }}" class="space-y-8">
                        @csrf

                        <div class="flex justify-center space-x-8 mb-6">
                            <!-- Laki-laki -->
                            <div>
                                <input type="radio" name="jenis_kelamin" value="L" id="pria" class="hidden peer" required>
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
                                <input type="radio" name="jenis_kelamin" value="P" id="wanita" class="hidden peer" required>
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

                        <div class="mb-6 bg-green-50 p-6 rounded-lg shadow-md">
                            <label for="berat" class="block text-md font-medium text-green-700">Berat Badan (kg):</label>
                            <input type="number" step="0.1" name="berat" value="{{ old('berat') }}" class="w-full p-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-md" required>
                            @error('berat')
                                <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-6 bg-green-50 p-6 rounded-lg shadow-md">
                            <label for="tinggi" class="block text-md font-medium text-green-700">Tinggi Badan (cm):</label>
                            <input type="number" name="tinggi" value="{{ old('tinggi') }}" class="w-full p-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-md" required>
                            @error('tinggi')
                                <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-6 bg-green-50 p-6 rounded-lg shadow-md">
                            <label for="usia" class="block text-md font-medium text-green-700">Usia (tahun):</label>
                            <input type="number" name="usia" value="{{ old('usia') }}" class="w-full p-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-md" required>
                            @error('usia')
                                <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('kesehatan.index') }}" class="px-6 py-2 bg-gray-400 text-white font-semibold rounded-lg hover:bg-gray-700 transition ease-in-out duration-300 flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </a>

                            <button type="submit" class="px-6 py-2 bg-[#578669] text-white font-semibold rounded-lg hover:bg-green-700 transition ease-in-out duration-300 flex items-center">
                                <i class="fas fa-calculator mr-2"></i> Hitung BMI
                            </button>


                        </div>
                    </form>

                    @if(session('bmi_result'))
                        <div class="mt-8 p-6 bg-green-100 text-green-800 rounded-lg shadow-md text-center">
                            <h2 class="text-xl font-bold mb-4">Hasil BMI Anda</h2>
                            
                            <p class="text-lg mb-1">Berat Badan: 
                                <span class="font-semibold">{{ session('berat') }} kg</span>
                            </p>

                            <p class="text-lg mb-1">Tinggi Badan: 
                                <span class="font-semibold">{{ session('tinggi') }} cm</span>
                            </p>

                            <p class="text-lg mb-1">BMI: 
                                <span class="font-semibold">{{ session('bmi_result') }}</span> 
                                ({{ session('kategori') }})
                            </p>

                            <p class="text-lg mb-1">Berat Badan Ideal: 
                                <span class="font-semibold">{{ session('berat_ideal') }} kg</span>
                            </p>

                            <p class="mt-2">{{ session('saran') }}</p>
                        </div>
                    @endif


                    @if (session('success'))
                        <div class="mt-6 p-4 bg-green-200 text-green-800 rounded-lg shadow-md">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="mt-6 p-4 bg-red-200 text-red-800 rounded-lg shadow-md">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                </div>
                <div class="mt-6 p-5 bg-yellow-100 text-yellow-800 rounded-lg shadow-md">
                    <strong>Disclaimer:</strong> Kalkulator ini hanya untuk informasi umum. Tidak untuk diagnosis medis. Untuk keperluan medis, konsultasikan ke dokter.
                </div>
            </div>
            <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-2xl shadow-2xl mx-auto mt-8 border border-blue-100">
                <div class="flex items-center justify-center mb-8">
                    <!-- <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-3 rounded-full mr-4 shadow-lg">
                        <i class="fas fa-history text-white text-xl"></i>
                    </div> -->
                    <h2 class="text-2xl font-bold text-gray-800 bg-black bg-clip-text text-transparent">
                        Riwayat BMI Anda
                    </h2>
                </div>

                @if($bmiResults->isEmpty())
                    <div class="text-center py-16">
                        <div class="bg-gradient-to-r from-gray-400 to-gray-500 p-4 rounded-full w-20 h-20 mx-auto mb-6 flex items-center justify-center shadow-lg">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <p class="text-gray-600 text-lg font-medium">Belum ada riwayat BMI yang dihitung.</p>
                        <p class="text-gray-500 text-sm mt-2">Mulai hitung BMI Anda untuk melihat riwayat di sini!</p>
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
                                        <i class="fas fa-calculator mr-2"></i>BMI
                                    </th>
                                    <th class="px-6 py-4 text-left font-semibold">
                                        <i class="fas fa-tags mr-2"></i>Kategori
                                    </th>
                                    <th class="px-6 py-4 text-left font-semibold rounded-tr-xl">
                                        <i class="fas fa-lightbulb mr-2"></i>Saran
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($bmiResults as $index => $history)
                                    <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 transform hover:scale-[1.01] {{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                                        <td class="px-6 py-4 text-gray-700 font-medium">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                                {{ $history->created_at->format('d-m-Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-700">
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                                {{ $history->berat }} kg
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-700">
                                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                                {{ $history->tinggi }} cm
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-700">
                                            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">
                                                {{ $history->usia }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-700">
                                            <div class="flex items-center">
                                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-orange-400 to-red-500 flex items-center justify-center text-white font-bold text-sm mr-3 shadow-md">
                                                    {{ number_format($history->bmi, 1) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                $categoryClass = 'bg-gray-100 text-gray-800';
                                                if(strpos(strtolower($history->kategori), 'normal') !== false) {
                                                    $categoryClass = 'bg-green-100 text-green-800 border border-green-200';
                                                } elseif(strpos(strtolower($history->kategori), 'kurus') !== false) {
                                                    $categoryClass = 'bg-blue-100 text-blue-800 border border-blue-200';
                                                } elseif(strpos(strtolower($history->kategori), 'gemuk') !== false || strpos(strtolower($history->kategori), 'obesitas') !== false) {
                                                    $categoryClass = 'bg-red-100 text-red-800 border border-red-200';
                                                }
                                            @endphp
                                            <span class="px-3 py-2 rounded-lg text-sm font-semibold {{ $categoryClass }} shadow-sm">
                                                {{ $history->kategori }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-600 text-sm max-w-xs">
                                            <div class="bg-gray-50 p-3 rounded-lg border-l-4 border-indigo-500 shadow-sm">
                                                <i class="fas fa-quote-left text-indigo-400 text-xs mr-1"></i>
                                                {{ $history->saran }}
                                                <i class="fas fa-quote-right text-indigo-400 text-xs ml-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Summary Statistics -->
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gradient-to-r from-green-400 to-green-600 p-4 rounded-xl text-white shadow-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-green-100 text-sm">Total Pengukuran</p>
                                    <p class="text-2xl font-bold">{{ $bmiResults->count() }}</p>
                                </div>
                                <i class="fas fa-chart-bar text-3xl text-green-200"></i>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-blue-400 to-blue-600 p-4 rounded-xl text-white shadow-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-blue-100 text-sm">BMI Terakhir</p>
                                    <p class="text-2xl font-bold">{{ number_format($bmiResults->first()->bmi ?? 0, 1) }}</p>
                                </div>
                                <i class="fas fa-tachometer-alt text-3xl text-blue-200"></i>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-purple-400 to-purple-600 p-4 rounded-xl text-white shadow-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-purple-100 text-sm">Pengukuran Pertama</p>
                                    <p class="text-xl font-bold">{{ $bmiResults->last()->created_at->format('d/m/Y') ?? '-' }}</p>
                                </div>
                                <i class="fas fa-clock text-3xl text-purple-200"></i>
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