<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Tracker - Daftar</title>
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
            <!-- Left Section  -->
            <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center items-center bg-gray-50">
                <h1 class="text-2xl md:text-3xl font-bold mb-4 text-center">Selamat Datang di Healthy Tracker!</h1>
                <p class="text-base mb-4 text-center">Waktunya untuk memulai hidup sehat.</p>
                <img 
                    src="{{ asset('image/healtrck.png') }}" 
                    alt="Health technology and digital health solutions" 
                    class="max-w-[75%] md:max-w-[75%] h-auto mb-4"
                />
            </div>

            <!-- Right Section -->
            <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center items-center">
                <h2 class="text-2xl font-bold mb-6 text-center">Gabung dengan Kami</h2>
                @if(session('success'))
                    <div class="text-green-600 bg-green-100 p-3 rounded-md mb-4 text-center">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('register') }}" method="post" class="w-full max-w-md">
                    @csrf
                    <div class="mb-4">
                        <input 
                            type="text"
                            name="name" 
                            placeholder="Username" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                            value="{{ old('name') }}"/>
                        @error('username')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="Alamat Email" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                            value="{{ old('email') }}"/>
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 relative">
                        <input 
                            type="password"
                            name="password" 
                            id="password" 
                            placeholder="Buat Password" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                        />
                        <i class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer" id="toggle-password"></i>
                        @error('password')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 relative">
                        <input 
                            type="password"
                            name="password_confirmation" 
                            id="password_confirmation" 
                            placeholder="Konfirmasi Password" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                        />
                        <i class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer" id="toggle-password-confirmation"></i>
                    </div>

                    <div class="flex items-center mb-4">
                        <input 
                            type="checkbox" required
                            class="mr-2 text-green-600 focus:ring-green-500"
                        />
                        <span class="text-sm text-gray-500">Saya setuju dengan syarat dan kebijakan privasi</span>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full p-3 bg-[#578a6d] text-white font-bold rounded-lg hover:bg-green-800 transition duration-300"
                    >
                        Daftar
                    </button>
                </form>

                <div class="text-center mt-6 w-full">
                    <p class="text-sm">Sudah menjadi anggota? <a href="{{ route('login') }}" class="text-green-700 hover:underline">Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('toggle-password');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Toggle password confirmation visibility
        const togglePasswordConfirmation = document.getElementById('toggle-password-confirmation');
        const passwordConfirmationField = document.getElementById('password_confirmation');

        togglePasswordConfirmation.addEventListener('click', function () {
            const type = passwordConfirmationField.type === 'password' ? 'text' : 'password';
            passwordConfirmationField.type = type;

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>
</html>
