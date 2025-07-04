@extends('layouts.sidebarUser')

@section('title', 'Olahraga')

@section('content')
@if(session('success'))
        <script>
            // Menampilkan alert dengan pesan sukses dari session
            alert("{{ session('success') }}");

            // Redirect setelah 3 detik
            setTimeout(function() {// Redirect ke dashboard admin
            }, 3000); // Delay 3 detik sebelum redirect
        </script>
        @endif
<div class="flex flex-col min-h-screen">
    <div class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-8"> 
        <div class="">
            <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Detail Olahraga</h1>
        </div>

        @include('layouts.notif_setting')
    </div>

    <!-- Container Putih -->
    <div class="container mx-auto px-8 py-8 bg-white shadow-lg rounded-lg">
        <!-- Video Embed -->
        <div class="relative w-full pb-[56.25%] mb-6">
            <iframe 
                src="{{ $olahraga->url_video }}" 
                class="absolute top-0 left-0 w-full h-full rounded-lg"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>

        <!-- Detail Informasi -->
        <h1 class="text-2xl font-bold mb-4">{{ $olahraga->nama }}</h1>

        <p class="text-gray-700 mb-6">{{ $olahraga->deskripsi }}</p>

        <div class="flex flex-wrap gap-3 mb-6 items-center">
            <!-- Kategori -->
            @php
                // Daftar 3 warna latar belakang dan teks yang sesuai
                $colors = [
                    'bg-red-100' => 'text-red-800',
                    'bg-blue-100' => 'text-blue-800',
                    'bg-green-100' => 'text-green-800',
                ];
            @endphp

            @foreach(explode(',', $olahraga->kategori) as $index => $kategori)
                @php
                    // Pilih warna latar belakang dan teks berdasarkan index kategori
                    $bgColor = array_keys($colors)[$index % count($colors)];
                    $textColor = $colors[$bgColor];
                @endphp
                <span class="{{ $bgColor }} {{ $textColor }} text-sm px-3 py-1 rounded-full">{{ trim($kategori) }}</span>
            @endforeach



            <!-- Durasi dengan Icon Jam -->
            <div class="flex items-center gap-2 text-sm text-purple-600 rounded-full bg-purple-200 px-3 py-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M12 20a8 8 0 0 0 8-8a8 8 0 0 0-8-8a8 8 0 0 0-8 8a8 8 0 0 0 8 8m0-18a10 10 0 0 1 10 10a10 10 0 0 1-10 10C6.47 22 2 17.5 2 12A10 10 0 0 1 12 2m.5 5v5.25l4.5 2.67l-.75 1.23L11 13V7z"/></svg>
                <span>{{ $olahraga->durasi }} menit</span>
            </div>
        </div>

        <!-- Tombol Selesai -->
        <form action="{{ route('aktivitas.store') }}" method="POST">
            @csrf
            <input type="hidden" name="olahraga_id" value="{{ $olahraga->id }}">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full">
                Selesai
            </button>
        </form>
    </div>
</div>
@include('layouts.footerUser')
@endsection
