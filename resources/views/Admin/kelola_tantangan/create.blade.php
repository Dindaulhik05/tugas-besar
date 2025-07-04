@extends('layouts.sidebarAdmin')

@section('title', 'Kelola Tantangan')

@section('content')
<div class="flex flex-col min-h-screen">
<div class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-8"> 
        <div class="mb-8">
            <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Kelola Tantangan</h1>
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
    <div class="container mx-auto ">

        <form action="{{ route('kelola_tantangan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-4">
                <!-- No Tantangan -->
                <div class="form-group">
                    <label for="no_tantangan" class="block">No Tantangan</label>
                    <input type="text" name="no_tantangan" id="no_tantangan" class="form-control w-full p-2 border rounded-lg" value="{{ old('no_tantangan') }}" required>
                    @error('no_tantangan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Judul Tantangan -->
                <div class="form-group">
                    <label for="title" class="block">Judul</label>
                    <input type="text" name="title" id="title" class="form-control w-full p-2 border rounded-lg" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="form-group">
                    <label for="description" class="block">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" class="form-control w-full p-2 border rounded-lg" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Detail -->
                <div class="form-group">
                    <label for="details" class="block">Detail</label>
                    <textarea name="details" id="details" rows="4" class="form-control w-full p-2 border rounded-lg" required>{{ old('details') }}</textarea>
                    @error('details')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Video Embed URL -->
                <div class="form-group">
                    <label for="video_embed_url" class="block">Video Embed URL</label>
                    <input type="url" name="video_embed_url" id="video_embed_url" class="form-control w-full p-2 border rounded-lg" value="{{ old('video_embed_url') }}" required>
                    @error('video_embed_url')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Thumbnail Video (Upload) -->
                <div class="form-group">
                    <label for="video_thumbnail" class="block">Thumbnail Video (Optional)</label>
                    <input type="file" name="video_thumbnail" id="video_thumbnail" class="form-control w-full p-2 border rounded-lg" accept="image/*">
                    @error('video_thumbnail')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tag -->
                <div class="form-group">
                    <label for="tag" class="block">Tag</label>
                    <input type="text" name="tag" id="tag" class="form-control w-full p-2 border rounded-lg" value="{{ old('tag') }}" required>
                    @error('tag')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Durasi -->
                <div class="form-group">
                    <label for="duration" class="block">Durasi</label>
                    <input type="text" name="duration" id="duration" class="form-control w-full p-2 border rounded-lg" value="{{ old('duration') }}" required>
                    @error('duration')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Poin Tantangan -->
                <div class="form-group">
                    <label for="poin_tantangan" class="block">Poin Tantangan</label>
                    <input type="number" name="poin_tantangan" id="poin_tantangan" class="form-control w-full p-2 border rounded-lg" value="{{ old('poin_tantangan') }}" required>
                    @error('poin_tantangan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                        <label for="tanggal_mulai" class="block text-gray-700 font-medium mb-2">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            value="{{ old('tanggal_mulai', $tantangan->tanggal_mulai ?? '') }}" required>
                        @error('tanggal_mulai')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Selesai -->
                    <div class="mb-4">
                        <label for="tanggal_selesai" class="block text-gray-700 font-medium mb-2">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            value="{{ old('tanggal_selesai', $tantangan->tanggal_selesai ?? '') }}" required>
                        @error('tanggal_selesai')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                <!-- Submit Button -->
                <div class="flex justify-center gap-4">
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">
                        Simpan Tantangan
                    </button>
                    <a href="{{ route('kelola_tantangan.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                        Kembali  
                    </a> 
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@include('layouts.footerAdmin')    
@endsection
