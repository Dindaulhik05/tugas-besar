<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.sidebarUser')

@section('content')
<div class="flex flex-col min-h-screen">
    <div id="mainContent" class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                    <h1 class="text-2xl font-bold hidden md:block">Tantangan</h1>
                    <!-- <p class="text-sm text-gray-500">Lanjutan</p> -->
                <!-- </div>   -->
            </div>

            @include('layouts.notif_setting')
        </div>
        <div class="container">
            <h2>Edit Profile</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" name="nama" value="{{ $profile->nama }}" required>
                </div>

                <div class="form-group">
                    <label for="berat_badan">Berat Badan:</label>
                    <input type="text" class="form-control" name="berat_badan" value="{{ $profile->berat_badan }}" required>
                </div>

                <div class="form-group">
                    <label for="tinggi_badan">Tinggi Badan:</label>
                    <input type="number" class="form-control" name="tinggi_badan" value="{{ $profile->tinggi_badan }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ $profile->tanggal_lahir }}">
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <input type="text" class="form-control" name="jenis_kelamin" value="{{ $profile->jenis_kelamin }}">
                </div>

                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon:</label>
                    <input type="text" class="form-control" name="no_telepon" value="{{ $profile->no_telepon }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" name="alamat">{{ $profile->alamat }}</textarea>
                </div>

                <div class="form-group">
                    <label for="profile_picture">Profile Picture:</label>
                    <input type="file" class="form-control" name="profile_picture">
                </div>

                <div class="form-group">
                    <label for="total_points">Total Points:</label>
                    <input type="number" class="form-control" name="total_points" value="{{ $profile->total_points }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@include('layouts.footerUser')    
@endsection
