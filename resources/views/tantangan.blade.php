@extends('layouts.sidebarUser')

@section('title', 'Tantangan')

@section('content')
<!-- Main Content -->
<div class="flex flex-col min-h-screen">
<div id="mainContent" class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                    <h1 class="text-2xl font-bold hidden md:block">Tantangan</h1>
                    <!-- <p class="text-sm text-gray-500">Lanjutan</p> -->
                <!-- </div>   -->
            </div>

            <!-- Notification settings -->
                @include('layouts.notif_setting')
        </div>

        <!-- Progres Bar dengan Desain Grafis -->
        <div class="bg-white p-4 rounded-lg w-full max-w-6xl mx-auto relative">
        <div class="absolute w-full h-3 bg-gray-200 rounded-full top-1/2 transform -translate-y-1/2 shadow-inner"></div>
            <!-- Progress Bar Background -->
            <div class="absolute w-full h-3 bg-gray-200 rounded-full top-1/2 transform -translate-y-1/2 shadow-inner"></div>
            
            <!-- Gradient Progress Fill -->
            @foreach ($challengesData as $challenge)
                @php
                    $progressPercentage = $challenge->challenge_status === 'submitted' ? 100 : 0;
                @endphp

                <div style="width: {{ $progressPercentage }}%"></div>
            @endforeach


            <div class="relative z-10 flex justify-between items-center w-full">
                @if (!empty($challengesData))
                    @foreach ($challengesData as $challenge)
                        @php
                            $isCompleted = $challenge->challenge_status === 'submitted';
                            $ringClass = $isCompleted 
                                ? 'bg-gradient-to-br from-green-500 to-green-600 ring-4 ring-green-200' 
                                : 'bg-gradient-to-br from-gray-300 to-gray-400 ring-4 ring-gray-200';
                        @endphp

                        <div class="group text-center relative">
                            <div class="w-16 h-16 flex items-center justify-center rounded-full 
                                {{ $ringClass }} 
                                text-white shadow-xl transform transition-all duration-300 hover:scale-110">
                                
                                @if ($isCompleted)
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </div>

                            <!-- Tooltip -->
                            <div class="absolute z-20 bottom-full left-1/2 transform -translate-x-1/2 mb-2 
                                bg-gray-800 text-white text-xs px-3 py-1.5 rounded-md opacity-0 
                                group-hover:opacity-100 transition-opacity duration-300">
                                {{ $challenge->no_tantangan }}
                                <div class="absolute top-full left-1/2 transform -translate-x-1/2 
                                    border-l-8 border-r-8 border-t-8 border-l-transparent border-r-transparent border-t-gray-800">
                                </div>
                            </div>

                            <span class="text-sm font-medium text-gray-700 mt-2 block">
                                {{ $challenge->no_tantangan }}
                            </span>
                        </div>
                    @endforeach
                @else
                    <div class="text-center text-gray-500 w-full">Tidak ada tantangan tersedia</div>
                @endif
            </div>
        </div>        
        

        <!-- Tantangan Cards Container -->
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6 mt-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-5">
                    <ul>
                        @foreach ($challengesData as $challenge)
                            <li>
                                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 mb-4">
                                    <button onclick="toggleContent('hari{{ $challenge->id }}')" class="w-full">
                                        <div class="flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b">
                                            
                                            <div class="flex-grow text-left">
                                                <h1 class="font-semibold text-lg {{ $challenge->challenge_status === 'submitted' ? 'text-green-800' : 'text-gray-600' }}">
                                                    {{ $challenge->no_tantangan }}
                                                </h1>
                                                <p class="text-sm text-gray-500">{{ $challenge->title }}</p>
                                            </div>

                                            
                                            <svg id="arrow-hari{{ $challenge->id }}" class="w-6 h-6 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </button>

                                    <div id="content-hari{{ $challenge->id }}" class="hidden">
                                        <div class="p-4 space-y-4">
                                            <div>
                                                <h2 class="font-semibold text-gray-700 mb-2">Deskripsi Tantangan:</h2>
                                                <div class="text-gray-600">
                                                    <ul class="list-disc list-inside space-y-2">
                                                        @foreach (explode(',', $challenge->details) as $detail)
                                                            @if (trim($detail) !== '')
                                                                <li>{{ trim($detail) }}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                            <div>
                                                <h2 class="font-semibold text-gray-700 mb-2">Perkiraan waktu:</h2>
                                                <p class="text-gray-600">{{ $challenge->duration }}</p>
                                            </div>

                                            <div class="flex items-center justify-between">
                                                <p>
                                                    Status:
                                                    <span id="status-{{ $challenge->id }}"
                                                        class="px-3 py-1 rounded-full text-sm font-medium {{ $challenge->challenge_status === 'submitted' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                        {{ $challenge->challenge_status === 'submitted' ? 'Selesai' : 'Belum Selesai' }}
                                                    </span>
                                                </p>
    
                                                @if (($challenge->challenge_status ?? 'pending') === 'pending')
                                                <a href="{{ route('tantangan.detail', $challenge->id) }}" 
                                                    class="bg-gray-300 text-white font-semibold py-2 px-6 rounded-lg hover:bg-gray-400 transition-colors duration-300 inline-flex items-center">
                                                    Mulai
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </a>

                                                @else
                                                    <a href="{{ route('tantangan.detail', $challenge->id) }}" class="bg-[#578669] text-white font-semibold py-2 px-6 rounded-lg">
                                                        Selesai
                                                    </a>
                                                @endif
                                            </div>

                                            <div id="progressBar-{{ $challenge->id }}" class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-[#578669] h-2.5 rounded-full" style="width: {{ $challenge->challenge_status === 'submitted' ? '100%' : '0%' }}"></div>
                                            </div>
                                            <p id="progressText-{{ $challenge->id }}" class="text-sm text-gray-500 text-center">
                                                {{ $challenge->challenge_status === 'submitted' ? '100% Selesai' : '0% Selesai' }}
                                            </p>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-sm text-gray-500 flex justify-between items-center">
                                            <span>
                                                <div>
                                                    @php
                                                        $isExpired = \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($challenge->tanggal_selesai));
                                                    @endphp

                                                    <h2 class=" {{ $isExpired ? 'text-red-500' : 'text-gray-600' }}">
                                                        Tantangan Selesai pada 
                                                        <span class="font-semibold">
                                                            {{ \Carbon\Carbon::parse($challenge->tanggal_selesai)->format('d M Y') }}
                                                        </span>
                                                    </h2>

                                                    @if($isExpired)
                                                        <p class="text-xs text-red-500">Tantangan ini sudah berakhir.</p>
                                                    @endif
                                                </div>
                                            </span>
                                            <span>🪙 {{ $challenge->poin_tantangan }}</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // tombol tantangan bisa  di klik
    function toggleContent(id) {
        const content = document.getElementById(`content-${id}`);
        const arrow = document.getElementById(`arrow-${id}`);
        
        // Toggle content visibility
        content.classList.toggle('hidden');
        
        // Rotate arrow
        if (content.classList.contains('hidden')) {
            arrow.style.transform = 'rotate(0deg)';
        } else {
            arrow.style.transform = 'rotate(180deg)';
        }
        }
</script>
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
