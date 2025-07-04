@extends('layouts.sidebarUser')

@section('title', 'Dashboard')

@section('content')
<!-- Main Content -->
<div class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8"> 
        <div>
            <!-- <h1>Hello Olivia</h1> -->
            <h1  class="lg:text-2xl font-bold text-gray-800 -mt-2 pt-1 hidden md:block">Hello, {{ $user->name }}!</h1>
            <p class="lg:text-gray-600 hidden md:block">Hari ini, langkah untuk lebih produktif.</p>
        </div>

        <!-- Notification settings -->
            @include('layouts.notif_setting')
    </div>

    <!-- Banner bg-gradient-to-r from-[#A8E0B7] via-[#A8E0B7] to-emerald-700 -->
    <div class="container mx-auto w-full overflow-hidden relative">
        <div id="slider" class="flex transition-transform duration-700">
            <!-- Slide 1 -->
            <div class="relative bg-gradient-to-br from-green-500 via-emerald-600 to-lime-400 text-white rounded-2xl overflow-hidden flex items-center justify-between w-full flex-shrink-0 h-[250px] md:h-[200px] lg:h-[300px]">
                <!-- Text Section -->
                <div class="p-4 md:p-10 w-full md:w-1/2 text-left">
                    <h2 class="text-lg md:text-2xl lg:text-3xl font-bold leading-tight mb-2 md:mb-4">
                        Raih Kesehatan Optimal dengan Satu Aplikasi
                    </h2>
                    <p class="text-white mb-4 text-xs md:text-sm lg:text-base">
                        Penuhi target kesehatan Anda dengan fitur lengkap: cek BMI, olahraga, dan kumpulkan hadiah menarik.
                    </p>
                    <div class="flex justify-start">
                        <div class="bg-[#78B3CE] hover:bg-[#5ba9c9] text-white font-bold py-2 px-4 md:py-3 md:px-6 rounded-full transition duration-300 text-xs md:text-sm lg:text-base">
                        Jelajahi
                        </div>
                    </div>
                </div>
                <!-- animasi Section -->
                <div class="w-full md:w-1/2 flex justify-center">
                    <dotlottie-player 
                        src="https://lottie.host/2553c2fe-f89c-485d-862f-0a8c7ad686a8/cBK4av6lGT.lottie" 
                        background="transparent" 
                        speed="1" 
                        class="w-full md:w-[270px] lg:w-[270px] h-auto" 
                        loop autoplay>
                    </dotlottie-player>
                </div>
            </div>

        
            <!-- Slide 2 -->
            <div class="relative bg-gradient-to-br from-emerald-700 via-green-600 to-cyan-500 text-white rounded-2xl overflow-hidden flex items-center justify-between w-full flex-shrink-0 h-[250px] md:h-[200px] lg:h-[300px]">
                <!-- Teks dan tombol bagian kiri -->
                <div class="p-8 w-full md:w-1/2 md:text-left">
                    <h2 class="text-lg md:text-2xl lg:text-3xl font-bold leading-tight mb-2 md:mb-4">
                        Siapkah Menyelesaikan Tantangan Hari Ini?
                    </h2>
                    <p class="text-white mb-4 text-xs md:text-sm lg:text-base">
                        Yuk mulai lakukan tantangan dan kumpulkan poin menarik setiap kali Anda menyelesaikan tantangan.
                    </p>
                    <div class="flex justify-start">
                        <div class="bg-[#003344] hover:bg-[#00272A] text-white font-bold py-2 px-4 md:py-3 md:px-6 rounded-full transition duration-300 text-xs md:text-sm lg:text-base">
                            Ayo Mulai
                        </div>
                    </div>
                </div>

                <!-- Animasi Section -->
                <div class="w-full md:w-1/2 flex justify-center">
                    <dotlottie-player 
                        src="https://lottie.host/51bbf2f4-ad10-404d-8f9f-2b559bc93841/YEMw53AOVN.lottie" 
                        background="transparent" 
                        speed="1" 
                        class="w-full md:w-[300px] lg:w-[380px] h-auto" 
                        loop autoplay>
                    </dotlottie-player>
                </div>
            </div>
        </div>    
    </div>
          

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 mt-8">
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-[#4ade80]" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M18 17v-3h-3v-2h3V9h2v3h3v2h-3v3zm-7 4l-3.175-2.85q-1.8-1.625-3.088-2.9t-2.125-2.4t-1.225-2.175T1 8.475q0-2.35 1.575-3.912T6.5 3q1.3 0 2.475.538T11 5.075q.85-1 2.025-1.537T15.5 3q2.125 0 3.563 1.288T20.85 7.3q-.45-.175-.9-.262t-.875-.088q-2.525 0-4.3 1.763T13 13q0 1.3.525 2.463T15 17.45q-.475.425-1.237 1.088T12.45 19.7z"/>
                </svg>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Kesehatanmu</h3>
                    <p class="text-xl font-bold">{{ $kategori ?? 'Data kosong' }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 32 32">
                    <g fill="none"><g filter="url(#f298idb)"><circle cx="16" cy="16.414" r="10.875" fill="url(#f298id0)"/></g><g filter="url(#f298idc)"><path fill="url(#f298id1)" fill-rule="evenodd" d="M16 30.383c7.715 0 13.969-6.254 13.969-13.969S23.715 2.445 16 2.445S2.031 8.7 2.031 16.415c0 7.714 6.254 13.968 13.969 13.968m0-3.094c6.006 0 10.875-4.869 10.875-10.875S22.006 5.54 16 5.54S5.125 10.408 5.125 16.414S9.994 27.29 16 27.29" clip-rule="evenodd"/></g><g filter="url(#f298idd)"><path fill="#dc7b3c" fill-rule="evenodd" d="M9.913 11.315a.6.6 0 0 0-.278.507v.28a.5.5 0 0 0 .438.496v7.597h-.108a.7.7 0 0 0-.677.524l-.31 1.186a.5.5 0 0 0 .484.626h12.45a.5.5 0 0 0 .488-.612l-.272-1.181a.7.7 0 0 0-.683-.543h-.107v-7.6a.5.5 0 0 0 .422-.493v-.28a.6.6 0 0 0-.277-.507L16.1 7.89a.75.75 0 0 0-.806 0zm9.816 8.88v-7.593h-1.61v7.593zm-3.219 0v-7.593H14.9v7.593zm-3.219 0v-7.593h-1.609v7.593z" clip-rule="evenodd"/></g><g filter="url(#f298ide)"><path fill="#ffc546" d="M9.948 11.54a.6.6 0 0 1 .277-.506l5.383-3.426a.75.75 0 0 1 .805 0l5.382 3.426a.6.6 0 0 1 .278.506v.28a.5.5 0 0 1-.5.5H10.448a.5.5 0 0 1-.5-.5z"/></g><path fill="url(#f298id2)" d="M9.948 11.54a.6.6 0 0 1 .277-.506l5.383-3.426a.75.75 0 0 1 .805 0l5.382 3.426a.6.6 0 0 1 .278.506v.28a.5.5 0 0 1-.5.5H10.448a.5.5 0 0 1-.5-.5z"/><path fill="url(#f298id3)" d="M10.385 12.117a.25.25 0 0 1 .25-.25h1.11a.25.25 0 0 1 .25.25v8.016h-1.61z"/><path fill="url(#f298id4)" d="M10.385 12.117a.25.25 0 0 1 .25-.25h1.11a.25.25 0 0 1 .25.25v8.016h-1.61z"/><path fill="url(#f298id5)" d="M13.604 11.867h1.609v8.266h-1.609z"/><path fill="url(#f298id6)" d="M13.604 11.867h1.609v8.266h-1.609z"/><path fill="url(#f298id7)" d="M16.823 11.867h1.609v8.266h-1.609z"/><path fill="url(#f298id8)" d="M16.823 11.867h1.609v8.266h-1.609z"/><path fill="url(#f298id9)" d="M20.041 11.867h1.609v8.266h-1.609z"/><path fill="url(#f298ida)" d="M20.041 11.867h1.609v8.266h-1.609z"/><g filter="url(#f298idf)"><path fill="#ffc248" d="M9.6 20.437a.7.7 0 0 1 .678-.523h11.48a.7.7 0 0 1 .682.543l.273 1.18a.5.5 0 0 1-.488.613H9.775a.5.5 0 0 1-.484-.626z"/></g><defs><linearGradient id="f298id0" x1="11.563" x2="23.313" y1="21.852" y2="7.039" gradientUnits="userSpaceOnUse"><stop stop-color="#f19d48"/><stop offset="1" stop-color="#e89a44"/></linearGradient><linearGradient id="f298id1" x1="16" x2="16" y1="2.445" y2="30.383" gradientUnits="userSpaceOnUse"><stop stop-color="#ffc444"/><stop offset="1" stop-color="#ffc24b"/></linearGradient><linearGradient id="f298id2" x1="19.313" x2="18.906" y1="9.289" y2="9.906" gradientUnits="userSpaceOnUse"><stop offset=".459" stop-color="#ffca3f"/><stop offset="1" stop-color="#ffca3f" stop-opacity="0"/></linearGradient><linearGradient id="f298id3" x1="10.531" x2="11.313" y1="15.059" y2="15.059" gradientUnits="userSpaceOnUse"><stop offset=".167" stop-color="#ffb33b"/><stop offset="1" stop-color="#ffc047"/></linearGradient><linearGradient id="f298id4" x1="11.995" x2="11.609" y1="16.686" y2="16.686" gradientUnits="userSpaceOnUse"><stop offset=".067" stop-color="#ffc34c"/><stop offset="1" stop-color="#ffc34c" stop-opacity="0"/></linearGradient><linearGradient id="f298id5" x1="13.75" x2="14.531" y1="15.059" y2="15.059" gradientUnits="userSpaceOnUse"><stop offset=".167" stop-color="#ffb33b"/><stop offset="1" stop-color="#ffc047"/></linearGradient><linearGradient id="f298id6" x1="15.213" x2="14.828" y1="16.686" y2="16.686" gradientUnits="userSpaceOnUse"><stop offset=".067" stop-color="#ffc34c"/><stop offset="1" stop-color="#ffc34c" stop-opacity="0"/></linearGradient><linearGradient id="f298id7" x1="16.969" x2="17.75" y1="15.059" y2="15.059" gradientUnits="userSpaceOnUse"><stop offset=".167" stop-color="#ffb33b"/><stop offset="1" stop-color="#ffc047"/></linearGradient><linearGradient id="f298id8" x1="18.432" x2="18.047" y1="16.686" y2="16.686" gradientUnits="userSpaceOnUse"><stop offset=".067" stop-color="#ffc34c"/><stop offset="1" stop-color="#ffc34c" stop-opacity="0"/></linearGradient><linearGradient id="f298id9" x1="20.188" x2="20.969" y1="15.059" y2="15.059" gradientUnits="userSpaceOnUse"><stop offset=".167" stop-color="#ffb33b"/><stop offset="1" stop-color="#ffc047"/></linearGradient><linearGradient id="f298ida" x1="21.651" x2="21.266" y1="16.686" y2="16.686" gradientUnits="userSpaceOnUse"><stop offset=".067" stop-color="#ffc34c"/><stop offset="1" stop-color="#ffc34c" stop-opacity="0"/></linearGradient><filter id="f298idb" width="22" height="22" x="4.875" y="5.539" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.25" dy=".25"/><feGaussianBlur stdDeviation=".5"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.831373 0 0 0 0 0.45098 0 0 0 0 0.196078 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_21332"/></filter><filter id="f298idc" width="28.538" height="28.538" x="1.731" y="2.145" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx=".3" dy=".3"/><feGaussianBlur stdDeviation=".3"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.886275 0 0 0 0 0.662745 0 0 0 0 0.235294 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_21332"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx=".3" dy="-.3"/><feGaussianBlur stdDeviation=".3"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.956863 0 0 0 0 0.607843 0 0 0 0 0.294118 0 0 0 1 0"/><feBlend in2="effect1_innerShadow_18_21332" result="effect2_innerShadow_18_21332"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dy="-.3"/><feGaussianBlur stdDeviation=".3"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.956863 0 0 0 0 0.607843 0 0 0 0 0.294118 0 0 0 1 0"/><feBlend in2="effect2_innerShadow_18_21332" result="effect3_innerShadow_18_21332"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.3" dy=".3"/><feGaussianBlur stdDeviation=".3"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 1 0 0 0 0 0.882353 0 0 0 0 0.337255 0 0 0 1 0"/><feBlend in2="effect3_innerShadow_18_21332" result="effect4_innerShadow_18_21332"/></filter><filter id="f298idd" width="14.651" height="15.959" x="8.362" y="7.172" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur result="effect1_foregroundBlur_18_21332" stdDeviation=".3"/></filter><filter id="f298ide" width="12.275" height="5.33" x="9.948" y="7.241" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dy="-.25"/><feGaussianBlur stdDeviation=".25"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.980392 0 0 0 0 0.647059 0 0 0 0 0.172549 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_21332"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx=".15" dy=".25"/><feGaussianBlur stdDeviation=".25"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.980392 0 0 0 0 0.647059 0 0 0 0 0.172549 0 0 0 1 0"/><feBlend in2="effect1_innerShadow_18_21332" result="effect2_innerShadow_18_21332"/></filter><filter id="f298idf" width="13.951" height="2.836" x="9.024" y="19.664" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx=".25" dy="-.25"/><feGaussianBlur stdDeviation=".2"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.992157 0 0 0 0 0.658824 0 0 0 0 0.0705882 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_21332"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.25" dy=".25"/><feGaussianBlur stdDeviation=".2"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 1 0 0 0 0 0.8 0 0 0 0 0.290196 0 0 0 1 0"/><feBlend in2="effect1_innerShadow_18_21332" result="effect2_innerShadow_18_21332"/></filter></defs></g>
                </svg>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Total Poin</h3>
                    <p class="text-xl font-bold">{{ $totalPoints }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="flex items-center">
                <i class="fas fa-trophy text-yellow-500 text-3xl"></i>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Tantanganmu</h3>
                    <p class="text-xl font-bold">{{ $tantanganSelesai }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md">
            <div class="flex items-center">
                <i class="fas fa-medal text-purple-500 text-3xl"></i>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Levelmu</h3>
                    <p class="text-xl font-bold">Pemula</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Workout Videos -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-xl font-bold mb-4">Video Olahraga Terbaru</h3>
            <div class="space-y-4">
                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                    <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                    <iframe 
                        width="80" height="80" src="https://www.youtube.com/embed/Cw-Wt4xKD2s?si=8StLMsSI-sboE-4a" 
                        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" 
                        class="rounded-md" 
                        allowfullscreen>
                    </iframe>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-semibold">Full Body HIIT</h4>
                        <p class="text-sm text-gray-500">30 menit • Tingkat Menengah</p>
                        <button class="mt-2 font-semibold text-[#578669] text-sm hover:text-green-800">Tonton Sekarang</button>
                    </div>
                </div>
                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                    <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                    <iframe 
                        width="80" height="80" src="https://www.youtube.com/embed/ow3hpYJqYEI?si=DL1wgWoK06MTcFaA" 
                        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"
                        class="rounded-md" 
                        allowfullscreen>
                    </iframe>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-semibold">Cardio Kickboxing</h4>
                        <p class="text-sm text-gray-500">45 menit • Semua Tingkat</p>
                        <button class="mt-2 font-semibold text-[#578669] text-sm hover:text-green-800">Tonton Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
        
            

        <!-- Active Challenges -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-xl font-bold mb-4">Tantangan Selesai</h3>

            @if($tantanganSelesaiList->count() > 0)
                <div class="space-y-4 max-h-72 overflow-y-auto pr-2"> {{-- Tambah scroll disini --}}
                    @foreach($tantanganSelesaiList as $tantangan)
                        <div class="border border-gray-200 p-4 rounded-lg">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-semibold">{{ $tantangan->no_tantangan }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $tantangan->title }}</p>
                                </div>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Selesai</span>
                            </div>

                            <div class="mt-4">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                                </div>
                                <p class="text-sm text-gray-500 mt-2">
                                    100% Selesai • {{ \Carbon\Carbon::parse($tantangan->updated_at)->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-400">Belum ada tantangan yang diselesaikan.</p>
            @endif
        </div>



        <!-- Rewards Shop -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-xl font-bold mb-4">Hadiah Tersedia</h3>
            <div class="swiper">
                <div class="swiper-wrapper">
                    @forelse ($hadiah as $item)
                        <div class="swiper-slide">
                            <div class="border border-gray-200 p-4 rounded-lg">
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-32 object-cover rounded-lg mb-4" alt="{{ $item->nama_hadiah }}">
                                <h4 class="font-semibold">{{ $item->nama_hadiah }}</h4>
                                <p class="text-sm text-gray-500 mt-1">🪙 {{ $item->points }} poin</p>
                                <button class="mt-4 w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-bold">
                                    Tukar
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <p class="text-center text-gray-500">Tidak ada hadiah yang tersedia.</p>
                        </div>
                    @endforelse

                    <div class="swiper-slide h-64 flex items-center justify-center">
                        <a href="" 
                        class="bg-white text-[#578669] px-4 py-2 rounded-lg font-semibold shadow-lg hover:bg-gray-100">
                        Lebih Banyak
                        </a>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- BMI Calculator -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-bold mb-4">Grafik Riwayat BMI</h2>

            @if ($bmiHistory->count() > 0)
                <!-- Canvas Chart -->
                <canvas id="bmiChart" height="160"></canvas>

                <!-- Script Chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const bmiLabels = JSON.parse('{!! json_encode($labels) !!}');
                    const bmiData = JSON.parse('{!! json_encode($values) !!}');

                    const ctx = document.getElementById('bmiChart').getContext('2d');
                    const bmiChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: bmiLabels,
                            datasets: [{
                                label: 'Nilai BMI',
                                data: bmiData,
                                fill: true,
                                backgroundColor: 'rgba(75, 192, 192, 0.1)',
                                borderColor: 'rgb(34, 197, 94)',
                                pointBackgroundColor: 'rgb(34, 197, 94)',
                                pointRadius: 4,
                                pointHoverRadius: 6,
                                tension: 0.3
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                    labels: {
                                        font: { size: 14 }
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return 'BMI: ' + context.parsed.y;
                                        }
                                    }
                                },
                                title: {
                                    display: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: false,
                                    title: {
                                        display: true,
                                        text: 'Nilai BMI',
                                        font: { size: 14 }
                                    },
                                    ticks: {
                                        stepSize: 2
                                    },
                                    min: 10,
                                    max: 40
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Tanggal',
                                        font: { size: 14 }
                                    },
                                    ticks: {
                                        autoSkip: true,
                                        maxTicksLimit: 10
                                    }
                                }
                            }
                        }
                    });
                </script>
            @else
                <!-- Fallback jika belum ada data -->
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-sm text-gray-500">Belum ada data BMI yang tercatat.</p>
                    <p class="text-lg font-bold text-[#578669]">Silakan hitung BMI terlebih dahulu.</p>
                </div>
            @endif
        </div>         
    </div>
</div>    
    
@if(session('success'))
<script>
    // Menampilkan alert dengan pesan sukses dari session
    alert("{{ session('success') }}");

    // Redirect setelah 3 detik
    setTimeout(function() {// Redirect ke dashboard admin
    }, 3000); // Delay 3 detik sebelum redirect
</script>
@endif

@include('layouts.footerUser')
@endsection
<style>
    .smooth-scroll {
        scroll-behavior: smooth;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(87, 134, 105, 0.6);
        border-radius: 8px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: rgba(87, 134, 105, 0.8);
    }
</style>
