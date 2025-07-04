<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <title>About Us</title>
</head>
<body>
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
                <img src="{{ asset ('/image/logo_proyek(1).png') }}" alt="logo" class="h-9" />
                <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#9BEC00] to-[#578669]">Healthy Tracker</h4>
            </a>
        </div>

        <ul class="flex flex-col md:flex-row items-center justify-center space-y-6 md:space-y-0 md:space-x-8 h-full md:h-auto">
            <li><a href="/LANDPAGE/landingpage" class="text-black hover:text-[#578669]">Home</a></li>
            <li><a href="/LANDPAGE/about" class="text-[#578669] hover:text-[#578669]">Tentang</a></li>
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


    <!-- Bagian Hero -->
    <section class="bg-gray-100 text-[#578669] text-center relative">
        <!-- Container Gambar -->
        <div class="relative w-full">
            <img 
                src="{{ asset ('/image/Desain tanpa judul (1).png') }}" 
                alt="Logo" 
                class="w-full h-auto object-cover opacity-75"
            >
            <!-- Teks di Atas Gambar -->
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-[#333] text-4xl md:text-5xl font-bold translate-y-[-20%] drop-shadow-2xl">
                Tentang Kami
                </h1>
            </div>
        </div>
    </section>
      

    <!-- Bagian Tentang Kami -->
    <section class="py-12 lg:mt-12">
        <div class="container mx-auto flex flex-col md:flex-row items-stretch gap-10 px-6 md:px-16">
            <!-- Bagian Kiri: Gambar -->
            <div class="w-full md:w-1/2 flex">
                <img 
                    src="{{ asset ('/image/Desain tanpa judul (6).png') }}" 
                    alt="healtrack Image" 
                    class="w-full h-full rounded-lg shadow-lg object-cover">
            </div>
            
            <!-- Bagian Kanan: Konten -->
            <div class="w-full md:w-1/2 bg-white p-8 rounded-lg shadow-lg relative flex flex-col justify-center">
                <!-- Teks Judul -->
                <h2 class="text-4xl font-bold text-[#2C3E50] mb-4">Selamat datang di Healthy Tracker!</h2>
                <!-- Paragraf Deskripsi -->
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Kami hadir sebagai sahabat terpercaya Anda dalam perjalanan menuju hidup yang lebih sehat dan berkualitas. 
                    Dengan komitmen tinggi, kami menyediakan solusi digital modern untuk membantu dalam kesehatan, kebugaran, dan gaya hidup sehari-hari Anda.
                </p>
            
                <!-- Elemen Dekoratif (Opsional) -->
                <div class="absolute top-[-20px] right-[-20px] w-16 h-16 bg-[#A8E0B7] rounded-full"></div>
                <div class="absolute bottom-4 right-4 w-4 h-4 bg-[#397D54] rounded-full"></div>
            </div>
        </div>
    </section>
    
      

    <!-- Bagian Pencapaian -->
    <section class="container mx-auto px-6 py-12 text-center mb-5">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Pencapaian Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <h3 class="text-4xl font-bold text-green-600">10M+</h3>
                <p class="text-gray-600">Kunjungan Bulanan</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-green-600">45K+</h3>
                <p class="text-gray-600">Bisnis Mempercayai Kami</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-green-600">12+</h3>
                <p class="text-gray-600">Penghargaan Industri</p>
            </div>
        </div>
    </section>


    <!-- Bagian Timeline -->
    <section class="bg-gradient-to-br from-emerald-700 via-green-600 to-cyan-500 text-white py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-center mb-12 opacity-0 translate-y-10 transition duration-700" data-observer>
                Cerita Perjalanan Kami
            </h2>
            <div class="relative">
                <!-- Timeline -->
                <div class="absolute w-1 bg-white top-0 bottom-0 left-1/2 transform -translate-x-1/2"></div>

                <!-- Langkah 1 -->
                <div class="mb-5 flex items-center opacity-0 translate-y-10 transition duration-700" data-observer>
                    <div class="w-1/2 px-6 text-right">
                        <h3 class="text-xl font-bold">Kami memulai dengan ide sederhana.</h3>
                        <p class="text-gray-200 leading-relaxed">
                            Healthy Tracker lahir dari keinginan untuk membantu setiap orang menjaga kebugaran dan kesehatan mereka secara lebih terstruktur.
                        </p>
                    </div>
                    <div class="w-1/2 px-6">
                        <div class="flex items-center justify-center  mx-auto">
                            <dotlottie-player
                                src="https://lottie.host/80fcef3b-b99b-43f5-a7b7-001c5d064b4d/SzdvIgXts7.lottie" 
                                background="transparent" speed="1" style="width: 300px; height: 300px" 
                                loop autoplay>
                            </dotlottie-player>
                        </div>
                    </div>
                </div>

                <!-- Langkah 2 -->
                <div class="mb-5 flex items-center opacity-0 translate-y-10 transition duration-700" data-observer>
                    <div class="w-1/2 px-6 order-last text-left">
                        <h3 class="text-xl font-bold">Tapi kami ingin lebih.</h3>
                        <p class="text-gray-200 leading-relaxed">
                            Kami memperluas layanan kami dengan menghadirkan fitur-fitur untuk memberikan solusi yang lebih inovatif dan relevan bagi kebutuhan pengguna.
                        </p>
                    </div>
                    <div class="w-1/2 px-6">
                            <div class="  flex items-center justify-center  mx-auto">
                            <dotlottie-player
                                src="https://lottie.host/28bd0bd8-7abf-4b89-a4e9-1204e71e8c5c/4c5d03nYNB.lottie" 
                                background="transparent" speed="1" style="width: 300px; height: 300px" 
                                loop autoplay>
                            </dotlottie-player>
                        </div>
                    </div>
                </div>

                <!-- Langkah 3 -->
                <div class="mb-5 flex items-center opacity-0 translate-y-10 transition duration-700" data-observer>
                    <div class="w-1/2 px-6 text-right">
                        <h3 class="text-xl font-bold">Dan kami terus melangkah.</h3>
                        <p class="text-gray-200 leading-relaxed">
                            Dengan pertumbuhan ini, pengaruh kami di industri kesehatan dan kebugaran semakin terasa, menjadikan Healthy Tracker salah satu solusi terpercaya.
                        </p>
                    </div>
                    <div class="w-1/2 px-6">
                            <div class=" flex items-center justify-center  mx-auto">
                            <dotlottie-player
                                src="https://lottie.host/1027e5d4-2e68-45d4-bc2e-c67db4096f44/uhlETrmffZ.lottie" 
                                background="transparent" speed="1" style="width: 350px; height: 350px" 
                                loop autoplay>
                            </dotlottie-player>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian Berlangganan -->
    <section class="text-gray-500 py-16 mt-10 mb-10">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6">Masukkan email Anda untuk mendapatkan pembaruan mingguan kami</h2>
            <div class="max-w-md mx-auto relative">
                <input 
                    id="emailInput"
                    type="email" 
                    placeholder="Masukkan Email" 
                    class="w-full px-6 py-4 text-lg rounded-full bg-inherit text-gray-600 placeholder-green-600 border border-green-500 focus:outline-none focus:border-indigo-400 pr-36"
                >
                <button 
                    id="subscribeButton"
                    class="absolute right-2 top-1/2 -translate-y-1/2 px-8 py-2.5 rounded-full bg-[#578669] hover:bg-[#397D54] text-white font-medium transition-colors text-lg"
                >
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <!-- modal email  terkirim-->
    <div id="emailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6 text-center">
            <h3 class="text-xl font-bold text-gray-700 mb-4">Berhasil!</h3>
            <p class="text-gray-600">Email Anda telah berhasil dikirim. Terima kasih telah berlangganan!</p>
            <button 
                id="closeModal" 
                class="mt-6 px-6 py-3 bg-[#578669] hover:bg-[#397D54] text-white rounded-lg transition"
            >
                Tutup
            </button>
        </div>
    </div>



    <!-- Footer -->
    <footer class="bg-gray-100 text-gray-800 py-10">
        <div class="container lg:px-16 mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- HealthyTracker Info -->
                <div>
                    <a href="#" class="flex items-center space-x-2 mb-4">
                        <img src="{{ asset ('/image/logo_proyek(1).png') }}" alt="logo" class="h-8">
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
                        <li><a href="/LANDPAGE/contactUs" class="text-gray-500 hover:text-[#578669]">Hubungi Kami</a></li>
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

    <!-- JavaScript Tombol Navigasi Mobile-->
    <script>
        const toggleButton = document.getElementById('mobile-menu-toggle');
        const closeButton = document.getElementById('mobile-menu-close');
        const nav = document.getElementById('main-nav');
        const overlay = document.getElementById('nav-overlay');

        // Fungsi untuk membuka menu
        function openMenu() {
            nav.classList.remove('-translate-x-full');
            overlay.classList.remove('invisible', 'opacity-0');
            overlay.classList.add('opacity-50');
        }

        // Fungsi untuk menutup menu
        function closeMenu() {
            nav.classList.add('-translate-x-full');
            overlay.classList.add('invisible', 'opacity-0');
            overlay.classList.remove('opacity-50');
        }

        // Event listener untuk tombol toggle
        toggleButton.addEventListener('click', openMenu);
        closeButton.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);

        //transisi text
        document.addEventListener("DOMContentLoaded", () => {
        const elements = document.querySelectorAll("[data-observer]");

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        // Menambahkan kelas transisi
                        entry.target.classList.remove("opacity-0", "translate-y-10");
                        entry.target.classList.add("opacity-100", "translate-y-0");

                        // Hentikan pengamatan setelah transisi selesai
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.1 } // Memicu saat 10% elemen terlihat
        );

        // Mengamati setiap elemen
        elements.forEach((el) => observer.observe(el));
    });

        //modal email
        document.addEventListener("DOMContentLoaded", () => {
        const subscribeButton = document.getElementById("subscribeButton"); // Tombol Subscribe
        const emailInput = document.getElementById("emailInput"); // Input Email
        const modal = document.getElementById("emailModal"); // Modal
        const closeModal = document.getElementById("closeModal"); // Tombol Tutup Modal

        // Fungsi untuk menampilkan modal
        const showModal = () => {
            modal.classList.remove("hidden");
        };

        // Fungsi untuk menyembunyikan modal dan mereset form
        const hideModal = () => {
            modal.classList.add("hidden");
            emailInput.value = ""; // Reset nilai input email
        };

        // Event saat tombol Subscribe diklik
        subscribeButton.addEventListener("click", (event) => {
            event.preventDefault(); // Mencegah submit form default
            if (emailInput.value.trim() !== "") {
                showModal(); // Tampilkan modal jika email diisi
            } else {
                alert("Mohon masukkan email Anda!"); // Validasi jika email kosong
            }
        });

        // Event saat tombol Tutup Modal diklik
        closeModal.addEventListener("click", () => {
            hideModal();
        });
    });

    </script>
</body>
</html>
