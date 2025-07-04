@extends('layouts.sidebarUser')

@section('title', 'Riwayat Olahraga')

@section('content')
<div class="flex flex-col min-h-screen">
    <div class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="lg:text-2xl font-bold text-gray-800">Riwayat Olahraga</h1>
            </div>

            @include('layouts.notif_setting')
        </div>

        <!-- Riwayat Olahraga List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($riwayatOlahraga as $riwayat)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $riwayat->olahraga->thumbnails) }}" alt="{{ $riwayat->olahraga->nama }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $riwayat->olahraga->nama }}</h2>
                        <p class="text-gray-600 mb-2">{{ Str::limit($riwayat->olahraga->deskripsi, 80) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(explode(',', $riwayat->olahraga->kategori) as $kategori)
                                <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded-full">{{ trim($kategori) }}</span>
                            @endforeach
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Durasi: {{ $riwayat->olahraga->durasi }} menit</span>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($riwayat->waktu_olahraga)->format('d M Y H:i') }}</span>
                        </div>

                        <!-- Delete Button -->
                        <button onclick="confirmDelete({{ $riwayat->id }})" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors mt-4">
                            Hapus
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 col-span-3">Anda belum melakukan olahraga.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $riwayatOlahraga->links() }}
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h3>
        <p class="mb-4">Apakah Anda yakin ingin menghapus riwayat olahraga ini?</p>
        <form id="deleteForm" method="POST" action="" class="flex gap-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">Ya, Hapus</button>
            <button type="button" onclick="closeModal()" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400">Batal</button>
        </form>
    </div>
</div>

<!-- JavaScript untuk Modal -->
<script>
    function confirmDelete(id) {
        // Set action URL untuk form penghapusan
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = '/riwayat-olahraga/' + id;

        // Tampilkan modal konfirmasi
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeModal() {
        // Sembunyikan modal
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

@include('layouts.footerUser')
@endsection
