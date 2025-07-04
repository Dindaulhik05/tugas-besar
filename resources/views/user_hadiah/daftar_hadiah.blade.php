@extends('layouts.sidebarUser')

@section('title', 'Kelola Hadiah')

@section('content')

<div class="flex flex-col min-h-screen">
<div class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-8"> 
        <div class="mb-8">
            <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Daftar Hadiah</h1>
        </div>

        <div class="flex items-center gap-4 -mt-7"> 
            <!-- Coin Score -->
        <div class="flex items-center gap-2 bg-white rounded-full px-4 py-2 shadow-sm">
            <span class="font-semibold">🪙 {{ $profile->total_points }}</span>
        </div>  
            <!-- Notification -->
            <div class="relative">
                <button id="notificationBtn" class="p-2 bg-green-600 rounded-full shadow-sm">
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
                <button id="settingsBtn" class="p-2 bg-green-600 rounded-full shadow-sm">
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
    
    @if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
        {{ session('error') }}
    </div>
@endif


<!-- Daftar Hadiah -->
<div class="container mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($hadiahs as $hadiah)
            <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col">
                <div class="p-4 pb-0">
                <h3 class="text-lg font-bold text-gray-800 mb-2 text-center">{{ $hadiah->nama_hadiah }}</h3>
                </div>

                @if($hadiah->image)
                    <img src="{{ asset('storage/' . $hadiah->image) }}" alt="{{ $hadiah->nama_hadiah }}" class="w-full h-40 object-contain bg-gray-100 p-3">
                @else
                    <div class="w-full h-40 flex items-center justify-center bg-gray-200 text-gray-500 text-sm">Tidak ada gambar</div>
                @endif

                <div class="p-4 flex flex-col justify-between flex-grow">
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-1">🎯 Poin: <span class="font-semibold">{{ $hadiah->points }}</span></p>
                        <p class="text-sm text-gray-600">📦 Stok: <span class="font-semibold">{{ $hadiah->stok }}</span></p>
                    </div>

                    <!-- Tombol untuk membuka modal dan mengirim data hadiah -->
                    <button onclick="openModal('{{ $hadiah->nama }}', '{{ $hadiah->id }}')" 
                        class="w-full bg-green-600 text-white py-2 rounded-md font-semibold hover:bg-green-700 transition">
                        Tukar
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal Syarat & Ketentuan -->
<div id="popup-modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 max-w-lg text-black">
        <h2 class="text-xl font-semibold mb-4 text-center">Syarat & Ketentuan</h2>
        <ol class="list-decimal list-inside mb-4 space-y-2 text-sm">
            <li>Hanya anggota terdaftar yang dapat menukarkan poin.</li>
            <li>Poin ditukar sesuai dengan saldo yang dimiliki.</li>
            <li>Poin tidak dapat dijual atau ditukar dengan uang tunai.</li>
            <li>Penukaran poin dilakukan melalui aplikasi atau situs web.</li>
            <li>Pengguna harus memposting hadiah di sosial media dan tag akun @healthytcracker.</li>
        </ol>
        
        <div class="flex items-center mb-6">
            <input type="checkbox" id="setuju" class="mr-2 accent-[#4CAF50] focus:ring-[#4CAF50]">
            <label for="setuju" class="text-sm">Saya Setuju</label>
        </div>
        
        <div class="flex justify-between">
            <button id="cancel-btn" class="bg-gray-200 text-gray-700 font-semibold rounded-lg px-4 py-2 hover:bg-gray-300 transition duration-200">Batal</button>
            <button id="next-btn" class="bg-[#4CAF50] text-white font-semibold rounded-lg px-4 py-2 disabled:opacity-50 hover:bg-[#45a049] transition duration-200" disabled>Selanjutnya</button>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Penukaran Hadiah -->
<div id="confirm-modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 max-w-md text-gray-800">
        <h2 class="text-xl font-semibold mb-4 text-center">Konfirmasikan Hadiah Anda</h2>
        
        <!-- Pesan sukses atau error -->
        @if(session('success'))
            <p class="text-green-600 text-center">{{ session('success') }}</p>
        @elseif(session('error'))
            <p class="text-red-600 text-center">{{ session('error') }}</p>
        @endif

        <form id="confirmation-form" method="POST" action="/user-hadiah/tukar/" class="space-y-4">
    @csrf
    <input type="hidden" name="hadiah_id" id="hadiah_id">
    
    <div>
        <input type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#4CAF50] focus:border-transparent transition duration-300" required>
    </div>
    <div>
        <input type="email" name="email" id="email" placeholder="Masukkan Email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#4CAF50] focus:border-transparent transition duration-300" required>
    </div>
    <div>
        <input type="tel" name="phone" id="phone" placeholder="Masukkan Nomor Telepon" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#4CAF50] focus:border-transparent transition duration-300" required>
    </div>
    <div>
        <textarea name="address" id="address" placeholder="Masukkan Alamat Lengkap" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#4CAF50] focus:border-transparent transition duration-300" required></textarea>
    </div>
    <button type="submit" class="bg-[#4CAF50] text-white font-bold rounded-lg px-4 py-2 w-full hover:bg-[#45a049] hover:shadow-lg transition duration-300">Kirim</button>
</form>

    </div>
</div>
    </div>
</div>

<script>
    // Fungsi untuk membuka modal syarat & ketentuan
    function openModal(hadiahName, hadiahId) {
    document.getElementById('popup-modal').classList.remove('hidden');
    document.getElementById('popup-modal').classList.add('flex');

    // Set hadiah_id di field hidden
    document.getElementById('hadiah_id').value = hadiahId;

    // Ubah action form secara dinamis
    document.getElementById('confirmation-form').action = `/user-hadiah/tukar/${hadiahId}`;
}


    // Tutup modal syarat & ketentuan
    document.getElementById('cancel-btn').addEventListener('click', () => {
        document.getElementById('popup-modal').classList.add('hidden');
        document.getElementById('popup-modal').classList.remove('flex');
        document.getElementById('setuju').checked = false;
        document.getElementById('next-btn').disabled = true;
    });

    // Aktifkan tombol "Selanjutnya" jika checkbox dicentang
    document.getElementById('setuju').addEventListener('change', function () {
        document.getElementById('next-btn').disabled = !this.checked;
    });

    // Tampilkan modal konfirmasi setelah "Selanjutnya" ditekan
    document.getElementById('next-btn').addEventListener('click', () => {
        document.getElementById('popup-modal').classList.add('hidden');
        document.getElementById('popup-modal').classList.remove('flex');
        document.getElementById('confirm-modal').classList.remove('hidden');
        document.getElementById('confirm-modal').classList.add('flex');
    });
</script>

</body>
</html>



@include('layouts.footerUser')  
</div>

@endsection