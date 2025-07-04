@extends('layouts.sidebarUser')

@section('title', 'Kelola Hadiah')

@section('content')
<div class="flex flex-col min-h-screen">
    <div id="mainContent" class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8"> 
            <div>
                <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Hadiah</h1>
            </div>

            @include('layouts.notif_setting')
        </div>

        <!-- Main content section -->
        <div class="bg-white rounded-lg min-h-screen p-5 relative">
    <!-- Header dengan ilustrasi -->
    <div class="bg-gradient-to-br from-green-100 via-green-50 to-blue-50 rounded-2xl p-8 mb-8 relative overflow-hidden">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="flex-1">
                <!-- Logo dan Judul -->
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-red-500 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"/>
                        </svg>
                    </div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-red-500">Tukar & Klaim</h1>
                </div>

                <!-- Welcome Text -->
                <div class="mb-6">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-2">Selamat datang di</h2>
                    <h2 class="text-2xl lg:text-3xl font-bold text-green-600 mb-4">Halaman Hadiah!</h2>
                    <p class="text-gray-700 text-base lg:text-lg max-w-2xl leading-relaxed">
                        Di sini, Anda dapat mengklaim poin yang telah Anda kumpulkan dan menukarkannya dengan berbagai 
                        hadiah menarik! Semakin banyak poin yang Anda kumpulkan, semakin banyak pilihan hadiah yang bisa 
                        Anda dapatkan.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('klaim.index') }}" class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Klaim Poin
                    </a>
                    <a href="{{ route('user_hadiah.daftar') }}" class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Tukar Poin
                    </a>
                </div>
            </div>

        <!-- Decorative elements -->
        <div class="absolute top-4 right-4 w-6 h-6 bg-yellow-300 rounded-full opacity-60"></div>
        <div class="absolute bottom-8 left-8 w-4 h-4 bg-pink-300 rounded-full opacity-60"></div>
        <div class="absolute top-1/2 right-12 w-3 h-3 bg-blue-300 rounded-full opacity-60"></div>
    </div>
    </div>
        </div>
        </div>

        
@include('layouts.footerUser')
@endsection