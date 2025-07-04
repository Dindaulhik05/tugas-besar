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

            <div class="flex items-center gap-4">
                <!-- Coin Score -->
                <!-- <div class="flex items-center gap-2 bg-white rounded-full px-4 py-2 shadow-sm">
                    <span class="font-semibold">🪙 20</span>
                </div> -->
                <!-- Notification settings -->
                @include('layouts.notif_setting')
            </div>
        </div>
        <div class="mx-auto ">

            <div class="mt-5 bg-white shadow-lg rounded-lg p-6 w-full mb-8">
                <div class="aspect-w-16 aspect-h-9 h-[60vh] sm:h-[30vh] md:h-[50vh] lg:h-[80vh]">
                    <iframe class="w-full h-full rounded-lg"
                            src="{{ $challenge->video_embed_url }}"
                            frameborder="0"
                            allowfullscreen>
                    </iframe>
                </div>
                    <h2 class="text-2xl font-bold mb-2">{{ $challenge->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $challenge->description }}</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            @php
                                $categories = explode(',', $challenge->tag ?? '');
                                $colors = ['blue', 'purple', 'orange', 'teal', 'yellow', 'pink'];
                            @endphp

                            @foreach ($categories as $index => $category)
                                @php $color = $colors[$index % count($colors)]; @endphp
                                <span class="px-3 py-1 bg-{{ $color }}-100 text-{{ $color }}-800 rounded-full text-sm">
                                    {{ trim($category) }}
                                </span>
                            @endforeach
                            <span class="text-gray-500">
                                <i class="far fa-clock mr-2"></i>
                                {{ $challenge->duration }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            

            
            <div class="bg-white shadow-xl rounded-2xl p-8 w-full mx-auto">
                <h2 class="text-2xl font-extrabold text-center mb-6 text-gray-800 tracking-tight">Upload Bukti Tantangan</h2>

                @if (!$existingUpload)
                    <!-- FORM Upload hanya muncul jika belum upload -->
                    <form action="{{ route('tantangan.submit.bukti', $challenge->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="relative flex flex-col items-center justify-center border-2 border-dashed border-blue-300 bg-blue-50 rounded-xl p-8 hover:bg-blue-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16v-4a4 4 0 014-4h2a4 4 0 014 4v4m-4 4h-4m8-4h2a2 2 0 002-2V7a2 2 0 00-2-2h-2.586a1 1 0 01-.707-.293l-1.414-1.414A1 1 0 0015.586 3H8.414a1 1 0 00-.707.293L6.293 4.707A1 1 0 015.586 5H3a2 2 0 00-2 2v7a2 2 0 002 2h2" />
                            </svg>

                            <label for="file_path" class="cursor-pointer flex flex-col items-center space-y-1">
                                <span class="text-gray-600 font-medium">Seret atau klik untuk unggah file</span>
                                <span class="text-sm text-gray-500">Format: JPG, PNG, PDF — maks. 5MB</span>
                                <input type="file" name="file_path" id="file_path" class="hidden" required>
                            </label>
                        </div>

                        <div class="flex justify-center space-x-4 pt-4">
                            <a href="{{ route('tantangan') }}" class="text-[#578669] font-semibold py-2 px-6 rounded-lg border border-[#578669] hover:bg-[#e3f0e3] transition">
                                ← Kembali
                            </a>

                            <button type="submit" class="bg-[#578669] text-white font-bold py-2 px-6 rounded-lg shadow hover:bg-[#456d57] transition-all duration-300">
                                Kirim Bukti
                            </button>
                        </div>
                    </form>
                @else
                    <!-- Jika sudah upload, tampilkan hasil -->
                    <div class="text-center space-y-4">
                        <p class="text-green-600 font-semibold">Bukti tantangan telah dikirim.</p>

                        @php
                            $file = $existingUpload->file_path;
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                        @endphp

                        @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                            <img src="{{ asset('storage/' . $file) }}" class="mx-auto rounded-lg max-w-full max-h-96" alt="Bukti Upload">
                        @elseif ($ext === 'pdf')
                            <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-blue-600 underline">Lihat file PDF</a>
                        @elseif ($ext === 'mp4')
                            <video controls class="mx-auto max-w-full rounded-lg">
                                <source src="{{ asset('storage/' . $file) }}" type="video/mp4">
                                Browser Anda tidak mendukung video.
                            </video>
                        @else
                            <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-blue-600 underline">Lihat File</a>
                        @endif

                        <div class="pt-6">
                            <a href="{{ route('tantangan') }}" class="text-[#578669] font-semibold py-2 px-6 rounded-lg border border-[#578669] hover:bg-[#e3f0e3] transition">
                                ← Kembali ke Daftar Tantangan
                            </a>
                        </div>
                    </div>
                @endif
            </div>

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