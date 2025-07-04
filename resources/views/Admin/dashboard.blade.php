@extends('layouts.sidebarAdmin')

@section('title', 'Dashboard')

@section('content')

    <!-- Main Content -->
<div class="flex flex-col min-h-screen">
    <div class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8"> 
            <div class="mb-8">
                <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Hello Admin, {{ $user->name }}!</h1>
            </div>

            <div class="flex items-center gap-4 -mt-7">   
                <!-- Notification -->
                <div class="relative">
                    <button id="notificationBtn" class="p-2 bg-[#578669] rounded-full shadow-sm">
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
                    <button id="settingsBtn" class="p-2 bg-[#578669] rounded-full shadow-sm">
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

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm font-medium">Total Pengguna</h3>
                <p class="text-3xl font-bold text-gray-800">{{ number_format($total_users) }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm font-medium">Pengguna Aktif</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $total_active_users }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500 text-sm font-medium">Penukaran Poin</h3>
                <p class="text-3xl font-bold text-gray-800">45</p>
            </div>
        </div>

        <div class="container mx-auto mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Data Pengguna</h2>
                <table class="w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border border-gray-300">ID</th>
                            <th class="py-2 px-4 border border-gray-300">Nama</th>
                            <th class="py-2 px-4 border border-gray-300">Email</th>
                            <th class="py-2 px-4 border border-gray-300">Status</th>
                            <th class="py-2 px-4 border border-gray-300">Tanggal Pendaftaran</th>
                            <th class="py-2 px-4 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($users as $user)
                        @if (!$user->is_admin)
                            <tr>
                                <td class="py-2 px-4 border border-gray-300">{{ $user->id }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $user->name }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $user->email }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $user->is_admin ? 'Admin' : 'Pengguna' }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $user->created_at }}</td>
                                <td class="py-2 px-4 border border-gray-300">
                                    <a href="" class="text-blue-500 hover:underline rounded-full px-2 py-1 bg-blue-100">
                                        <i class="ri-edit-2-line"></i>
                                    </a>
                                    <a href="" class="text-white hover:underline rounded-full px-2 py-1 bg-red-600" onclick="return confirm('Yakin ingin menghapus pengguna ini?');">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Konfirmasi Tantangan -->
        <div class="container mx-auto mb-3">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Konfirmasi Tantangan</h2>
                <table class="w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border border-gray-300">User ID</th>
                            <th class="py-2 px-4 border border-gray-300">Nama</th>
                            <th class="py-2 px-4 border border-gray-300">Challenge ID</th>
                            <th class="py-2 px-4 border border-gray-300">Bukti Upload</th>
                            <th class="py-2 px-4 border border-gray-300">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buktiTantangan as $bukti)
                            <tr>
                                <td class="py-2 px-4 border border-gray-300 text-center">{{ $bukti->user->id ?? 'Tidak Diketahui' }}</td>    
                                <td class="py-2 px-4 border border-gray-300 text-center">{{ $bukti->user->name ?? 'Tidak Diketahui' }}</td>
                                <td class="py-2 px-4 border border-gray-300 text-center">{{ $bukti->challenge_id }}</td>
                                <td class="py-2 px-4 border border-gray-300">
                                    <img src="{{ asset('storage/' . $bukti->file_path) }}" alt="Bukti Upload" class="max-w-[150px] max-h-[150px] rounded shadow mx-auto">
                                </td>
                                <td class="py-2 px-4 border border-gray-300 text-center">
                                    @if($bukti->status == 'pending' && $bukti->is_claimed == 0)
                                        <form action="{{ route('Admin.konfir_bukti.confirm', $bukti->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-full hover:bg-green-600">
                                                Konfirmasi
                                            </button>
                                        </form>
                                    @else
                                        <span class="bg-green-100 text-green-800 rounded-full px-3 py-1">
                                            {{ ucfirst($bukti->status) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        

            <!-- Form Edit Hadiah -->
            <!-- <div class="bg-white rounded-lg shadow">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-medium">Edit Hadiah</h2>
                </div>
                <div class="p-6">
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Hadiah</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Poin yang Dibutuhkan</label>
                            <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Gambar Hadiah</label>
                            <div class="mt-1 flex items-center">
                                <span class="inline-block h-12 w-12 rounded-md overflow-hidden bg-gray-100">
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>
                                <button type="button" class="ml-5 bg-white px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                    Ganti Gambar
                                </button>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#23ba64] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
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

@include('layouts.footerAdmin')
@endsection
</body>
</html>
