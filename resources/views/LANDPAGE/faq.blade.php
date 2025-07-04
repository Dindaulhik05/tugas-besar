<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</head>
<html>
    <!-- Button Toggle untuk Mobile -->
    <button id="mobile-menu-toggle" class="md:hidden absolute top-5 left-4 z-50">
        <i class="ri-menu-line text-2xl"></i>
    </button>

    <!-- Navigasi -->
    <nav id="main-nav" class="fixed top-0 left-0 bottom-0 w-64 bg-white shadow-sm transform -translate-x-full transition-transform duration-300 ease-in-out 
        md:sticky md:translate-x-0 md:flex md:justify-between md:items-center md:px-16 md:py-4 md:w-full z-40">
        <button id="mobile-menu-close" class="md:hidden absolute top-4 right-4">
            <i class="ri-close-line text-2xl"></i>
        </button>
        <div class="nav__logo flex justify-center md:block mt-16 md:mt-0">
            <a href="/LANDPAGE/lendingpage" class="flex items-center space-x-2">
                <img src="{{ asset ('image/logo_proyek(1).png') }}" alt="logo" class="h-9" />
                <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#9BEC00] to-[#578669]">Healthy Tracker</h4>
            </a>
        </div>

        <ul class="flex flex-col md:flex-row items-center justify-center space-y-6 md:space-y-0 md:space-x-8 h-full md:h-auto">
            <li><a href="/LANDPAGE/landingpage" class="text-black hover:text-[#578669]">Home</a></li>
            <li><a href="/LANDPAGE/about" class="text-black hover:text-[#578669]">Tentang</a></li>
            <li><a href="/LANDPAGE/contactUs" class="text-black hover:text-[#578669]">Hubungi</a></li> 
            <li>
                <a href="{{ url('/login') }}" class="bg-[#578669] text-white px-6 py-2 rounded-full hover:bg-[#598066] transition">
                    Login
                </a>
            </li>
        </ul>
    </nav>

    <!-- Overlay semi-transparan untuk Nav Mobile-->
    <div id="nav-overlay" class="fixed inset-0 bg-black opacity-0 invisible transition-all duration-300 z-30 md:hidden"></div>

    <!-- Content -->
    <div class="container bg-gray-50 px-4 sm:px-6 md:px-8 lg:px-12">
        <div class="text-center mb-12">
            <div class="flex justify-center">
                <dotlottie-player
                    src="https://lottie.host/2d194c50-4234-4e2a-893f-58a842031ce1/ro6y0iVSdd.lottie"
                    background="transparent"
                    speed="1"
                    class="w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96"
                    loop autoplay>
                </dotlottie-player>
            </div>
            <p class="text-gray-600 font-bold text-base sm:text-lg lg:text-xl">Temukan jawaban untuk pertanyaan umum tentang layanan kami</p>
        </div>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <!-- Card Example -->
            <div class="bg-white p-4 sm:p-6 rounded-lg shadow hover:shadow-lg flex flex-col items-center text-center">
                <div class="bg-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                        <path fill="currentColor" d="M20 20h10v2H20zm0 4h6v2h-6z"/><path fill="currentColor" d="M30 17v-1a13.987 13.987 0 1 0-10.77 13.625l-.46-1.946A12 12 0 0 1 16 28c-.19 0-.375-.019-.563-.027A20.3 20.3 0 0 1 12.026 17Zm-2.041-2h-5.984a24.3 24.3 0 0 0-2.774-10.559A12.02 12.02 0 0 1 27.96 15M16.563 4.027A20.3 20.3 0 0 1 19.974 15h-7.948a20.3 20.3 0 0 1 3.411-10.973C15.625 4.02 15.81 4 16 4s.375.019.563.027m-3.764.414A24.3 24.3 0 0 0 10.025 15H4.042a12.02 12.02 0 0 1 8.757-10.559m0 23.118A12.02 12.02 0 0 1 4.042 17h5.983a24.3 24.3 0 0 0 2.774 10.559"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-green-600 mb-2">Apa itu Layanan Kami?</h3>
                <p class="text-gray-600 text-sm sm:text-base">Pelajari bagaimana layanan kami dapat membantu kebutuhan Anda dengan mudah.</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg flex flex-col items-center text-center">
                <div class="bg-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m13.387 3.425l6.365 4.243a1 1 0 0 1 0 1.664l-6.365 4.244a2.5 2.5 0 0 1-2.774 0L4.248 9.332a1 1 0 0 1 0-1.664l6.365-4.243a2.5 2.5 0 0 1 2.774 0m6.639 8.767a2 2 0 0 1-.577.598l-6.05 4.084a2.5 2.5 0 0 1-2.798 0l-6.05-4.084a2 2 0 0 1-.779-2.29l6.841 4.56a2.5 2.5 0 0 0 2.613.098l.16-.098l6.841-4.56a2 2 0 0 1-.201 1.692m0 3.25a2 2 0 0 1-.577.598l-6.05 4.084a2.5 2.5 0 0 1-2.798 0l-6.05-4.084a2 2 0 0 1-.779-2.29l6.841 4.56a2.5 2.5 0 0 0 2.613.098l.16-.098l6.841-4.56a2 2 0 0 1-.201 1.692"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-green-600 mb-2">Platform yang Kami Tawarkan</h3>
                <p class="text-gray-600">Jelajahi platform kami untuk mendukung kebugaran dan kesehatan Anda.</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg flex flex-col items-center text-center">
                <div class="bg-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15 15">
                        <path fill="currentColor" d="M11.555 2C9.41 2 6.534 3.471 4.602 6H3C1.843 6 1.18 6.864.723 7.777L.11 9H3l1.5 1.5L6 12v2.889l1.223-.612C8.136 13.821 9 13.157 9 12v-1.602c2.529-1.932 4-4.809 4-6.953V2zM9 5a1 1 0 1 1 0 2a1 1 0 0 1 0-2m-6.5 6l-.5.5c-.722.722-1 2.5-1 2.5s1.698-.198 2.5-1l.5-.5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-green-600 mb-2">Memulai Penggunaan Layanan</h3>
                <p class="text-gray-600">Ikuti panduan untuk memulai dan mengoptimalkan layanan kami.</p>
            </div>

            <!-- Card 4 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg flex flex-col items-center text-center">
                <div class="bg-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 496 512">
                        <path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248s248-111 248-248S385 8 248 8m0 448c-110.3 0-200-89.7-200-200S137.7 56 248 56s200 89.7 200 200s-89.7 200-200 200m-80-216c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32m160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32m4 72.6c-20.8 25-51.5 39.4-84 39.4s-63.2-14.3-84-39.4c-8.5-10.2-23.7-11.5-33.8-3.1c-10.2 8.5-11.5 23.6-3.1 33.8c30 36 74.1 56.6 120.9 56.6s90.9-20.6 120.9-56.6c8.5-10.2 7.1-25.3-3.1-33.8c-10.1-8.4-25.3-7.1-33.8 3.1"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-green-600 mb-2">Menyapa Pelanggan</h3>
                <p class="text-gray-600">Pengaturan dan penyesuaian untuk memulai percakapan dengan pelanggan.</p>
            </div>

            <!-- Card 5 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg flex flex-col items-center text-center">
                <div class="bg-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19 10a3 3 0 0 1 3 3v3a3 3 0 0 1-3 3v.966c0 1.06-1.236 1.639-2.05.96L14.638 19H12a3 3 0 0 1-3-3v-3a3 3 0 0 1 3-3z" class="duoicon-secondary-layer" opacity="0.3"/><path fill="currentColor" d="M16 4a3 3 0 0 1 3 3v1h-8a4 4 0 0 0-4 4v4c0 1.044.4 1.996 1.056 2.708L7 19.5c-.824.618-2 .03-2-1V17a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3z" class="duoicon-primary-layer"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-green-600 mb-2">Inbox Canggih</h3>
                <p class="text-gray-600">Memberikan kepuasan dengan merespons pelanggan dengan cepat dan efektif.</p>
            </div>

            <!-- Card 6 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg flex flex-col items-center text-center">
                <div class="bg-green-600 text-white w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 12 12">
                        <path fill="currentColor" d="M2.25 1C1.56 1 1 1.56 1 2.25v1.162a1.5 1.5 0 0 0 .772 1.31l2.876 1.599a3 3 0 1 0 2.704 0l2.877-1.598A1.5 1.5 0 0 0 11 3.412V2.25C11 1.56 10.44 1 9.75 1zM5 5.372V2h2v3.372l-1 .556zM8 9a2 2 0 1 1-4 0a2 2 0 0 1 4 0"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-green-600 mb-2">Tur Produk</h3>
                <p class="text-gray-600">Memberikan fitur sebaik mungkin untuk kebutuhan pengguna.</p>
            </div>
        </div>
    </div>    
    
    <!-- FAQ Section -->
    <div class="container px-4 sm:px-6 md:px-8 lg:px-12 space-y-4 mb-8">
        <div class="space-y-4 bg-gray-300 bg-opacity-50 p-4 sm:p-6 pb-6 sm:pb-8 rounded-lg">
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-900">General FAQ</h2>

            <!-- FAQ Item Example -->
            <div class="bg-white rounded-lg shadow-md">
                <button class="faq-button w-full px-4 sm:px-6 py-4 text-left focus:outline-none flex justify-between items-center hover:bg-gray-50">
                    <span class="font-medium text-gray-900 text-sm sm:text-base">Bagaimana cara membuat akun?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-4 sm:px-6 pb-4">
                        <p class="text-gray-600 text-sm sm:text-base">Klik tombol "Daftar" di halaman utama aplikasi. Masukkan nama, alamat email, dan kata sandi yang aman. Setelah itu, ikuti langkah-langkah verifikasi untuk mulai menggunakan aplikasi.</p>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="bg-white rounded-lg shadow-md">
                <button class="faq-button w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center hover:bg-gray-50">
                    <span class="font-medium text-gray-900">Apa yang harus saya lakukan jika lupa kata sandi?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600">Klik "Lupa Kata Sandi?" di halaman masuk, masukkan alamat email Anda, dan ikuti petunjuk untuk mereset kata sandi.</p>
                    </div>
                </div>
            </div>
                

            <!-- FAQ Item 3 -->
            <div class="bg-green-100 rounded-lg shadow-md">
                <button class="faq-button w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center hover:bg-gray-50">
                    <span class="font-medium text-gray-900">Bagaimana cara menghitung BMI menggunakan aplikasi?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600">Masukkan tinggi badan, berat badan dan jenis kelamin Anda di fitur "Kesehatan". Aplikasi akan menghitung dan memberikan rekomendasi berdasarkan hasil BMI Anda.</p>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="bg-white rounded-lg shadow-md">
                <button class="faq-button w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center hover:bg-gray-50">
                    <span class="font-medium text-gray-900">Apakah data kesehatan saya akan dibagikan ke pihak lain?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600">Tidak, semua data Anda hanya digunakan untuk keperluan aplikasi dan tidak akan dibagikan ke pihak ketiga tanpa izin Anda.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white rounded-lg shadow-md">
                <button class="faq-button w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center hover:bg-gray-50">
                    <span class="font-medium text-gray-900">Bagaimana cara mendapatkan poin?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600">Poin akan diberikan kepada pengguna setiap kali berhasil menyelesaikan sebuah tantangan kebugaran yang telah dipilih atau dengan konsisten mengikuti rutinitas olahraga sesuai dengan panduan yang tersedia di aplikasi.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white rounded-lg shadow-md">
                <button class="faq-button w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center hover:bg-gray-50">
                    <span class="font-medium text-gray-900">Apa saja hadiah yang bisa ditukar dengan poin?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600">Hadiah dapat berupa barang olahraga yang menarik sehingga Anda tidak bosan dengan Aplikasi Healhty Tracker. Lihat katalog hadiah di menu "Tukar Poin".</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white rounded-lg shadow-md">
                <button class="faq-button w-full px-6 py-4 text-left focus:outline-none flex justify-between items-center hover:bg-gray-50">
                    <span class="font-medium text-gray-900"> Bagaimana aplikasi ini melindungi data saya?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-6 pb-4">
                        <p class="text-gray-600">Kami menggunakan enkripsi tingkat tinggi untuk memastikan semua data kesehatan dan pribadi Anda aman.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <div class="container px-4 sm:px-6 md:px-8 lg:px-12 space-y-4 mb-8">
        <div class=" bg-green-50 p-8 rounded-lg text-center">
            <!-- Judul -->
            <h3 class="text-lg sm:text-xl font-bold text-[#4a6c54] mb-4">Tidak menemukan jawaban yang Anda cari?</h3>
            <p class="text-gray-600 text-sm sm:text-base mb-6">
                Kirim pesan kepada kami melalui tombol "Hubungi Kami" dan Tim akan segera menghubungi Anda kembali.
            </p>
        
            <div class="flex justify-center">
                <a href="/LANDING_PAGE/contactUS" class="flex items-center bg-white text-[#578669] px-6 py-3 rounded-lg shadow hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11.95 18q.525 0 .888-.363t.362-.887t-.362-.888t-.888-.362t-.887.363t-.363.887t.363.888t.887.362m-.9-3.85h1.85q0-.825.188-1.3t1.062-1.3q.65-.65 1.025-1.238T15.55 8.9q0-1.4-1.025-2.15T12.1 6q-1.425 0-2.312.75T8.55 8.55l1.65.65q.125-.45.563-.975T12.1 7.7q.8 0 1.2.438t.4.962q0 .5-.3.938t-.75.812q-1.1.975-1.35 1.475t-.25 1.825M12 22q-2.075 0-3.9-.787t-3.175-2.138T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/>
                    </svg>
                    <p class="ml-2 text-gray-500">Hubungi Kami</p>
                </a>
            </div>
        </div>    
    </div>
    
    
    <!-- Footer -->
    <footer class="bg-gray-100 text-gray-800 py-10">
        <div class="container lg:px-16 mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- HealthyTracker Info -->
                <div>
                    <a href="#" class="flex items-center space-x-2 mb-4">
                        <img src="{{ asset ('/image/logo_proyek(1).png') }}" alt="logo" class="h-10">
                        <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#9BEC00] to-[#578669]">Healthy Tracker</h4>
                    </a>
                    <p class="text-gray-600">
                        Platform kesehatan dan kebugaran untuk membantu mencapai kehidupan yang lebih sehat.
                    </p>
                </div>

                <!-- Links -->
                <div class="lg:ml-8">
                    <h4 class="text-lg font-bold mb-4">Informasi</h4>
                    <ul class="space-y-3">
                        <li><a href="/LANDPAGE/about" class="text-gray-500 hover:text-[#578669]">Tentang Kami</a></li>
                        <li><a href="/LANDPAGE/contactUS" class="text-gray-500 hover:text-[#578669]">Hubungi Kami</a></li>
                        <li><a href="/LANDPAGE/faq" class="text-gray-500 hover:text-[#578669]">FAQ</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="lg:-ml-8">
                    <h4 class="text-lg font-bold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-[#578669] w-6"></i>
                            <span class="ml-2 text-gray-500">support@healthytracker.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-[#578669] w-6"></i>
                            <span class="ml-2 text-gray-500">+62 123 4567 890</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt text-[#578669] w-6"></i>
                            <span class="ml-2 text-gray-500">Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-[#578669] hover:text-[#4b4b4b]">
                            <i class="fab fa-facebook text-2xl"></i>
                        </a>
                        <a href="#" class="text-[#578669] hover:text-[#4b4b4b]">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                        <a href="#" class="text-[#578669] hover:text-[#4b4b4b]">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-t border-gray-300 text-center pt-5 mt-8">
            <p class="text-gray-500">
                © 2024 Healthy Tracker. All rights reserved.
            </p>
        </div>
    </footer>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!--- java script-->
    <script>
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mainNav = document.getElementById('main-nav');
        const navOverlay = document.getElementById('nav-overlay');
    
        // Fungsi untuk membuka menu
        function openMenu() {
            mainNav.classList.remove('-translate-x-full');
            navOverlay.classList.remove('invisible');
            navOverlay.classList.remove('opacity-0');
            navOverlay.classList.add('opacity-50');
        }
    
        // Fungsi untuk menutup menu
        function closeMenu() {
            mainNav.classList.add('-translate-x-full');
            navOverlay.classList.add('invisible');
            navOverlay.classList.add('opacity-0');
            navOverlay.classList.remove('opacity-50');
        }
    
        // Event listener untuk membuka menu
        mobileMenuToggle.addEventListener('click', openMenu);
    
        // Event listener untuk menutup menu
        mobileMenuClose.addEventListener('click', closeMenu);
    
        // Menutup menu saat overlay diklik
        navOverlay.addEventListener('click', closeMenu);

        //pesan tersembunyi
        document.addEventListener('DOMContentLoaded', function() {
            const faqButtons = document.querySelectorAll('.faq-button');
        
            faqButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Get the content panel
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('svg');
        
                    // Close all other FAQ items
                    document.querySelectorAll('.faq-content').forEach(item => {
                        if (item !== content && item.style.maxHeight) {
                            item.style.maxHeight = null;
                            const otherIcon = item.previousElementSibling.querySelector('svg');
                            otherIcon.style.transform = 'rotate(0deg)';
                        }
                    });
        
                    // Toggle current FAQ item
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                        icon.style.transform = 'rotate(0deg)';
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                        icon.style.transform = 'rotate(180deg)';
                    }
        
                    // Add active state to button
                    button.classList.toggle('text-blue-600');
                });
            });
        });
    </script>
</body>
</html>