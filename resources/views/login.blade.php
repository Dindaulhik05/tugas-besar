<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Tracker - Login</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="font-inter bg-white text-black min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Left Section -->
            <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center items-center bg-gray-50">
                <h1 class="text-2xl md:text-3xl font-bold mb-4 text-center">Selamat Datang Kembali!</h1>
                <p class="text-base mb-4 text-center">Masuk untuk melanjutkan perjalanan sehatmu.</p>
                <img 
                    src="{{ asset('image/healtrck.png') }}" 
                    alt="Healthy Tracker" 
                    class="max-w-[75%] md:max-w-[75%] h-auto mb-4"
                />
            </div>

            <!-- Right Section -->
            <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center items-center">
                <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
                @if(session('error'))
                    <div class="text-red-600 bg-red-100 p-3 rounded-md mb-4 text-center">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="post" class="w-full max-w-md">
                    @csrf
                    <div class="mb-4">
                        <input 
                            type="text"
                            name="name" 
                            placeholder="Username" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                            value="{{ old('name') }}"
                        />
                        @error('username')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 relative">
                        <input 
                            type="password"
                            name="password" 
                            id="password" 
                            placeholder="Password" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                        />
                        <i class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer" id="toggle-password"></i>
                        @error('password')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" class="mr-2 text-green-600 focus:ring-green-500">
                            <span class="text-sm text-gray-500">Ingat saya</span>
                        </div>
                        <a href="#" class="text-sm text-green-700 hover:underline">Lupa password?</a>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full p-3 bg-[#578a6d] text-white font-bold rounded-lg hover:bg-green-800 transition duration-300"
                    >
                        Login
                    </button>
                </form>

                <div class="text-center mt-6 w-full">
                    <p class="text-sm">Belum punya akun? <a href="{{ route('register') }}" class="text-green-700 hover:underline">Daftar</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('toggle-password');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            // Toggle password field type between 'password' and 'text'
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            // Toggle the eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>
</html>
