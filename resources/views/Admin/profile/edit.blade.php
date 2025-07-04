@extends('layouts.sidebarAdmin')

@section('title', 'Profile Admin')

@section('content')
<div class="flex flex-col min-h-screen">
<div class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-5"> 
        <div class="mb-8">
            <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Profile</h1>
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
    <div class="container mx-auto">
    <div class="mx-auto bg-white p-8 rounded-lg shadow-md">

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Foto Profil Preview -->
            <div class="flex justify-center">
                <div class="relative w-32 h-32">
                    @if ($profile->profile_pict)
                        <img id="profilePreview" class="rounded-full object-cover w-full h-full border-4 border-gray-300" src="{{ asset('storage/' . $profile->profile_pict) }}" alt="Foto Profil">
                    @else
                        <img id="profilePreview" class="rounded-full object-cover w-full h-full border-4 border-gray-300" src="{{ asset('images/default-profile.png') }}" alt="Foto Profil">
                    @endif
                </div>
            </div>

            <!-- Nama -->
            <div class="flex flex-col space-y-2">
                <label class="text-gray-500 font-medium">Nama</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $profile->name) }}" 
                    class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200" 
                    required
                >
            </div>

            <!-- Bio -->
            <div class="flex flex-col space-y-2">
                <label class="text-gray-500 font-medium">Bio</label>
                <textarea 
                    name="bio" 
                    rows="3" 
                    class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200"
                >{{ old('bio', $profile->bio) }}</textarea>
            </div>

            <!-- No Telepon -->
            <div class="flex flex-col space-y-2">
                <label class="text-gray-500 font-medium">No Telepon</label>
                <input 
                    type="text" 
                    name="phone" 
                    value="{{ old('phone', $profile->phone) }}" 
                    class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200"
                >
            </div>

            <!-- Jenis Kelamin -->
            <div class="flex flex-col space-y-2">
                <label class="text-gray-500 font-medium">Jenis Kelamin</label>
                <select 
                    name="gender" 
                    class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200" 
                    required
                >
                    <option value="L" {{ $profile->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $profile->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Upload Foto Profil -->
            <div class="flex flex-col space-y-2">
                <label class="text-gray-500 font-medium">Foto Profil</label>
                <input 
                    type="file" 
                    name="profile_pict" 
                    class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200" 
                    onchange="previewImage(event)"
                >
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-center gap-3">
                    <a 
                        href="{{ route('admin.profile.index') }}" 
                        class="px-6 py-3 bg-gray-400 text-white font-semibold rounded-lg shadow-md transition duration-300"
                    >
                        Kembali
                    </a>
                
                <button 
                    type="submit" 
                    class="px-6 py-3 bg-[#578669] text-white font-semibold rounded-lg shadow-md transition duration-300"
                >
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<!-- Script Preview Gambar -->
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('profilePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</div>    

@include('layouts.footerAdmin')
@endsection

