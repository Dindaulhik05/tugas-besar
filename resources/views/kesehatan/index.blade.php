@extends('layouts.sidebarUser')

@section('title', 'Cek BMI')

@section('content')
<div class="flex flex-col min-h-screen">
    <div id="mainContent" class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
       <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="lg:text-2xl font-bold text-gray-800">Riwayat Olahraga</h1>
            </div>

            @include('layouts.notif_setting')
        </div>
        

        <!-- Main content section -->
        <div class="bg-white rounded-lg min-h-screen p-5 relative">
            <!-- Decorative dots pattern -->
            <div class="absolute top-5 left-5 w-24 h-24 opacity-30" style="background-image: radial-gradient(circle, #e5e7eb 2px, transparent 2px); background-size: 15px 15px;"></div>

            <!-- Main Content Container -->
            <div class="container mx-auto p-8">
                <div class="flex justify-between items-center mb-16 relative">
                    <div class="flex-1 max-w-lg">
                        <div class="flex items-center bg-white bg-opacity-90 px-4 py-2 rounded-full mb-5 w-fit shadow-lg">
                            <span class="text-gray-600 text-sm mr-2">Health Matters</span>
                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-xs">♥</span>
                            </div>
                        </div>
                        
                        <h1 class="text-5xl font-bold text-gray-800 mb-5 leading-tight">
                            Pantau Kesehatan Anda
                        </h1>
                        
                        <p class="text-gray-600 text-base mb-3 leading-relaxed">
                            Hitung BMI atau BMR Anda dengan mudah dan cepat.
                        </p>
                        
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Pantau kesehatan tubuh Anda untuk keputusan yang lebih tepat tentang diet dan kebugaran.
                        </p>
                    </div>
                    
                    <div class="flex-1 flex justify-end relative">
                        <div class="w-96 h-72 bg-white bg-opacity-20 rounded-3xl relative overflow-hidden">
                            <img src="{{ asset('/image/kesehatan.jpg') }}" alt="Illustration Image" class="w-full h-full object-cover">
                        </div>
                        
                        <div class="absolute -top-4 -right-4 w-12 h-12 bg-cyan-300 rounded-full flex items-center justify-center border-4 border-white shadow-lg">
                            <span class="text-white text-xl font-bold">+</span>
                        </div>
                    </div>
                </div>
                
                <!-- BMI and BMR Cards -->
                <div class="flex justify-center gap-16 mt-10">
                    <!-- BMI Card -->
                    <div class="bg-white rounded-3xl p-10 text-center shadow-xl flex-1 max-w-sm relative overflow-hidden">
                        <!-- <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-blue-200 to-blue-300 rounded-full flex items-center justify-center relative">
                            <div class="w-20 h-20 bg-gray-400 rounded-full"></div>
                        </div> -->
                        <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-blue-200 to-blue-300 rounded-full flex items-center justify-center relative">
        <!-- BMI Icon -->
        <div class="relative">
            <!-- Person figure -->
            <div class="flex flex-col items-center">
                <!-- Head -->
                <div class="w-5 h-5 bg-white rounded-full mb-1"></div>
                <!-- Body with arms -->
                <div class="relative w-8 h-10 bg-white rounded-lg mb-1">
                    <div class="absolute -left-1 top-1 w-2 h-6 bg-white rounded-full transform -rotate-12"></div>
                    <div class="absolute -right-1 top-1 w-2 h-6 bg-white rounded-full transform rotate-12"></div>
                </div>
                <!-- Legs -->
                <div class="flex space-x-1 mb-2">
                    <div class="w-2 h-6 bg-white rounded-full"></div>
                    <div class="w-2 h-6 bg-white rounded-full"></div>
                </div>
            </div>
            
            <!-- Scale platform -->
            <div class="w-12 h-2 bg-gray-700 rounded-full mx-auto mb-1"></div>
            
            <!-- BMI text -->
            <div class="text-xs font-bold text-white text-center">BMI</div>
            
            <!-- Scale indicator -->
            <div class="absolute -bottom-1 -left-2 flex space-x-0.5">
                <div class="w-1 h-3 bg-red-400 rounded-full"></div>
                <div class="w-1 h-4 bg-yellow-400 rounded-full"></div>
                <div class="w-1 h-5 bg-green-400 rounded-full"></div>
                <div class="w-1 h-4 bg-orange-400 rounded-full"></div>
            </div>
        </div>
    </div>
                        
                        <h3 class="text-4xl font-bold text-gray-800 mb-6 tracking-wider">BMI</h3>
                        
                        <p class="text-gray-600 text-sm leading-relaxed mb-8">
                            BMI adalah metode sederhana untuk mengukur apakah berat badan seseorang berada dalam kategori ideal, kurang, atau berlebih. Hitung BMI Anda sekarang untuk mengetahui kondisi tubuh Anda.
                        </p>
                        
                        <a href="{{ route('kesehatan.bmi') }}" class="bg-gradient-to-r from-cyan-500 to-cyan-600 text-white py-3 px-8 rounded-full font-semibold text-base hover:from-cyan-600 hover:to-cyan-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Hitung BMI
                        </a>
                    </div>
                    
                    <!-- Separator dots -->
                    <div class="flex flex-col justify-center items-center space-y-3">
                        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                    </div>
                    
                    <!-- BMR Card -->
                    <div class="bg-white rounded-3xl p-10 text-center shadow-xl flex-1 max-w-sm relative overflow-hidden">
                        <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-blue-200 to-blue-300 rounded-full flex items-center justify-center relative">
                            <div class="relative">
                                <div class="w-16 h-20 bg-white rounded border-2 border-gray-300 relative">
                                    <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 w-6 h-2 bg-gray-400 rounded"></div>
                                    <div class="absolute top-4 left-2 right-2">
                                        <div class="flex items-end space-x-1 h-8">
                                            <div class="w-1 bg-red-400 h-4"></div>
                                            <div class="w-1 bg-orange-400 h-6"></div>
                                            <div class="w-1 bg-green-400 h-3"></div>
                                            <div class="w-1 bg-blue-400 h-7"></div>
                                            <div class="w-1 bg-purple-400 h-5"></div>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-2 left-2 w-3 h-4 bg-blue-500 rounded-t-full"></div>
                                </div>
                                <div class="absolute -bottom-2 -right-2 w-6 h-6 border-2 border-gray-600 rounded-full">
                                    <div class="absolute -bottom-1 -right-1 w-2 h-3 bg-gray-600 rounded transform rotate-45"></div>
                                </div>
                            </div>
                        </div>
                        
                        <h3 class="text-4xl font-bold text-gray-800 mb-6 tracking-wider">BMR</h3>
                        
                        <p class="text-gray-600 text-sm leading-relaxed mb-8">
                            BMR adalah cara untuk menghitung jumlah kalori yang dibutuhkan tubuh saat istirahat guna menjalankan fungsi dasar. Hitung BMR Anda sekarang untuk mengetahui kebutuhan energi tubuh secara akurat.
                        </p>
                        
                        <a href="{{ route('kesehatan.bmr') }}" class="bg-gradient-to-r from-cyan-500 to-cyan-600 text-white py-3 px-8 rounded-full font-semibold text-base hover:from-cyan-600 hover:to-cyan-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Hitung BMR
                        </a>
                    </div>
                </div>
            </div>

            <!-- Disclaimer Section -->
            <div class="mt-6 p-5 bg-yellow-100 text-yellow-800 rounded-lg shadow-md text-center max-w-3xl mx-auto">
                <strong>Disclaimer:</strong> Kalkulator ini hanya untuk informasi umum. Untuk keperluan medis, konsultasikan ke dokter.
            </div>
        </div>
    </div>
</div>

@include('layouts.footerUser')
@endsection