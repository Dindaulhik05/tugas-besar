@extends('layouts.sidebarAdmin')

@section('title', 'Edit Tantangan')

@section('content')
<div class="flex flex-col min-h-screen">
    <div class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-8"> 
            <div class="mb-8">
                <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Edit Tantangan</h1>
            </div>
        </div>

        <div class="container mx-auto ">
            <form action="{{ route('kelola_tantangan.update', $tantangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  <!-- Gunakan PUT method untuk update -->

                <div class="space-y-4">
                    <!-- No Tantangan -->
                    <div class="form-group">
                        <label for="no_tantangan" class="block">No Tantangan</label>
                        <input type="text" name="no_tantangan" id="no_tantangan" class="form-control w-full p-2 border rounded-lg" value="{{ old('no_tantangan', $tantangan->no_tantangan) }}" required>
                        @error('no_tantangan')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Judul Tantangan -->
                    <div class="form-group">
                        <label for="title" class="block">Judul</label>
                        <input type="text" name="title" id="title" class="form-control w-full p-2 border rounded-lg" value="{{ old('title', $tantangan->title) }}" required>
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label for="description" class="block">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" class="form-control w-full p-2 border rounded-lg" required>{{ old('description', $tantangan->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Detail -->
                    <div class="form-group">
                        <label for="details" class="block">Detail</label>
                        <textarea name="details" id="details" rows="4" class="form-control w-full p-2 border rounded-lg" required>{{ old('details', $tantangan->details) }}</textarea>
                        @error('details')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Video Embed URL -->
                    <div class="form-group">
                        <label for="video_embed_url" class="block">Video Embed URL</label>
                        <input type="url" name="video_embed_url" id="video_embed_url" class="form-control w-full p-2 border rounded-lg" value="{{ old('video_embed_url', $tantangan->video_embed_url) }}" required>
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
                        <!-- Menampilkan Thumbnail Lama Jika Ada -->
                        @if($tantangan->video_thumbnail)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $tantangan->video_thumbnail) }}" alt="Thumbnail" class="w-32 h-32 object-cover">
                                <p class="text-sm text-gray-500 mt-1">Thumbnail saat ini</p>
                            </div>
                        @endif
                    </div>

                    <!-- Tag -->
                    <div class="form-group">
                        <label for="tag" class="block">Tag</label>
                        <input type="text" name="tag" id="tag" class="form-control w-full p-2 border rounded-lg" value="{{ old('tag', $tantangan->tag) }}" required>
                        @error('tag')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Durasi -->
                    <div class="form-group">
                        <label for="duration" class="block">Durasi Tantangan</label>
                        <input type="text" name="duration" id="duration" class="form-control w-full p-2 border rounded-lg" value="{{ old('duration', $tantangan->duration) }}" required>
                        @error('duration')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Poin Tantangan -->
                    <div class="form-group">
                        <label for="poin_tantangan" class="block">Poin Tantangan</label>
                        <input type="number" name="poin_tantangan" id="poin_tantangan" class="form-control w-full p-2 border rounded-lg" value="{{ old('poin_tantangan', $tantangan->poin_tantangan) }}" required>
                        @error('poin_tantangan')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Mulai -->
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
