@extends('layouts.sidebarUser')

@section('title', 'Olahraga')

@section('content')
@if(session('success'))
    <script>
        // Menampilkan alert dengan pesan sukses dari session
        alert("{{ session('success') }}");

        // Redirect setelah 3 detik
        setTimeout(function() {
            // Redirect ke dashboard admin
        }, 3000); // Delay 3 detik sebelum redirect
    </script>
@endif
<div class="flex flex-col min-h-screen">
    <div class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-8"> 
            <div>
                <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Olahraga</h1>
            </div>

            @include('layouts.notif_setting')
        </div>

        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('olahraga.index') }}" class="mb-6 flex gap-4 items-center">
        <div class="relative w-full">
            <!-- Input Text untuk Pencarian -->
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Cari berdasarkan nama atau kategori..." 
                class="w-full p-2 pr-10 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
            >
            <!-- Icon Search -->
            <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3zM9.5 14q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14"/></svg>
            </button>
        </div>

        <!-- Tombol Histori dengan Ikon Waktu -->
        <a href="{{ route('riwayat.olahraga') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-300 inline-flex items-center gap-1">
            <!-- Ikon Waktu -->
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M12 21q-3.45 0-6.012-2.287T3.05 13H5.1q.35 2.6 2.313 4.3T12 19q2.925 0 4.963-2.037T19 12t-2.037-4.962T12 5q-1.725 0-3.225.8T6.25 8H9v2H3V4h2v2.35q1.275-1.6 3.113-2.475T12 3q1.875 0 3.513.713t2.85 1.924t1.925 2.85T21 12t-.712 3.513t-1.925 2.85t-2.85 1.925T12 21m2.8-4.8L11 12.4V7h2v4.6l3.2 3.2z"/></svg>
            Histori
        </a>
    </form>



        <!-- List Video -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($olahragas as $olahraga)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $olahraga->thumbnails) }}" alt="{{ $olahraga->nama }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <!-- Judul yang Diklik -->
                        <h2 class="text-xl font-semibold mb-2">
                            <a href="{{ route('detail_olahraga.show', $olahraga->id) }}" class="text-gray-800">
                                {{ $olahraga->nama }}
                            </a>
                        </h2>
                        <p class="text-gray-600 mb-2">{{ Str::limit($olahraga->deskripsi, 80) }}</p>

                        <!-- Kategori -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(explode(',', $olahraga->kategori) as $kategori)
                                <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded-full">{{ trim($kategori) }}</span>
                            @endforeach
                        </div>

                        <!-- Link Lihat Video Dihapus -->
                        <!-- <a href="{{ route('detail_olahraga.show', $olahraga->id) }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Lihat Video
                        </a> -->
                    </div>
                </div>
            @empty
                <p class="text-gray-600 col-span-3">Tidak ada video olahraga ditemukan.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $olahragas->withQueryString()->links() }}
        </div>
    </div>
    @include('layouts.footerUser')
</div>
@endsection
