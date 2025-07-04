<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Landing Page Healthy Tracker</title>
    <style>
        body { overflow-x: hidden; }
        .text-outline { color: transparent; -webkit-text-stroke: 2px #666; text-stroke: 2px #666; }
        @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-20px); } 100% { transform: translateY(0px); } }
        .floating { animation: float 6s ease-in-out infinite; }
    </style>
</head>

<body class="bg-white text-gray-900">
    <!-- Button Toggle untuk Mobile -->
    <button id="mobile-menu-toggle" class="md:hidden absolute top-5 left-4 z-50">
        <i class="ri-menu-line text-2xl"></i>
    </button>

    <!-- Navigasi -->
    <nav id="main-nav" class="fixed top-0 left-0 bottom-0 w-64 bg-white transform -translate-x-full transition-transform duration-300 ease-in-out md:sticky md:translate-x-0 md:flex md:justify-between md:items-center md:px-16 md:py-4 md:shadow-sm md:w-full z-40">
        <button id="mobile-menu-close" class="md:hidden absolute top-4 right-4">
            <i class="ri-close-line text-2xl"></i>
        </button>
        <div class="nav__logo flex justify-center md:block mt-16 md:mt-0">
            <a href="{{ url('/LANDPAGE/landingpage') }}" class="flex items-center space-x-2">
                <img src="{{ asset('/image/logo_proyek(1).png') }}" alt="logo" class="h-9" />
                <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#9BEC00] to-[#578669]">Healthy Tracker</h4>
            </a>
        </div>

        <ul class="flex flex-col md:flex-row items-center justify-center space-y-6 md:space-y-0 md:space-x-8 h-full md:h-auto">
            <li><a href="/LANDPAGE/landingpage" class="text-[#578669] hover:text-[#578669]">Home</a></li>
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

    <!-- Header -->
    <header class="container max-w-screen-xl px-4 md:px-16 md: grid grid-cols-1 md:grid-cols-2 gap-8 items-center mt-10" id="home">
        <div class="header_content space-y-6 flex flex-col justify-center text-center md:text-left">
            <h4 class="text-[#578669] font-semibold text-base md:text-lg tracking-wide">APLIKASI KESEHATAN DAN KEBUGARAN</h4>
            <h1 class="text-3xl md:text-5xl font-bold text-[#333] leading-snug">
                <span class="text-outline">BUAT</span> PERUBAHAN KESEHATANMU
            </h1>
            <p class="text-gray-600 text-lg md:text-lg leading-relaxed">
                Lepaskan potensimu dan mulailah perjalanan menuju tubuh yang sehat, bugar, dan lebih percaya diri.
            </p>

            <div class="flex flex-col md:flex-row justify-center md:justify-start gap-4">
                <a href="{{ url('/login') }}" class="px-6 py-3 bg-[#578669] text-white rounded-lg hover:bg-[#598066] text-center shadow-md transition duration-300 w-auto">
                    Mulai Sekarang
                </a>
            </div>
        </div>
        <div class="relative">
            <img 
                src="{{ asset('/image/healtrck.png') }}" 
                alt="header" 
                class="relative object-cover max-w-full h-auto floating"
            />
        </div>
    </header>

    <!-- About Us -->
    <section class="container max-w-screen-xl px-4 py-12 md:px-16 mx-auto md:-mt-12">
        <div class="text-center">
            <h2 class="text-2xl md:text-2xl font-bold text-[#333] mt-2">
                TENTANG KAMI
            </h2>
            <div class="h-1 w-20 bg-green-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Gambar dengan elemen dekoratif -->
            <div class="relative flex justify-center items-center">
                <div class="relative">
                    <img 
                        src="{{ asset('/image/len2.png') }}" 
                        alt="header" 
                        class="relative object-cover w-[300px] h-[300px] sm:w-[400px] sm:h-[400px] lg:w-[500px] lg:h-[500px] floating"
                    />
                </div>
            </div>

            <!-- Konten dengan tipografi yang stylish -->
            <div class="relative mt-6">
                <div class="relative z-10 space-y-6">
                    <!-- Item 1 -->
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fas fa-mobile-alt text-green-600 text-2xl"></i>
                        </div>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            <span class="font-semibold text-gray-800">HealthyTracker</span> adalah aplikasi inovatif yang dirancang untuk membantu pengguna dalam memantau, menjaga, dan meningkatkan kesehatan.
                        </p>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fas fa-cog text-green-600 text-xl"></i>
                        </div>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            Dilengkapi dengan fitur canggih yang dapat disesuaikan dengan kebutuhan individu.
                        </p>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            Memberikan pengalaman yang komprehensif dalam meraih gaya hidup sehat.
                        </p>
                    </div>
                </div>

                <!-- Tombol "Learn More" -->
                <div class="mt-8 flex justify-center">
                    <a href="/LANDING_PAGE/about.php" class="inline-block bg-[#578669] hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    Lebih Banyak
                    </a>
                </div>
     

                <!-- Tagline tambahan -->
                <!-- <div class="mt-8 flex flex-wrap gap-4">
                    <div class="flex items-center gap-2 bg-blue-50 px-4 py-2 rounded-lg">
                        <i class="fas fa-user-check text-blue-600"></i>
                        <span class="text-blue-600 font-medium">Personalized</span>
                    </div>
                    <div class="flex items-center gap-2 bg-purple-50 px-4 py-2 rounded-lg">
                        <i class="fas fa-rocket text-purple-600"></i>
                        <span class="text-purple-600 font-medium">Innovative</span>
                    </div>
                    <div class="flex items-center gap-2 bg-yellow-50 px-4 py-2 rounded-lg">
                        <i class="fas fa-shield-alt text-yellow-500"></i>
                        <span class="text-yellow-500 font-medium">Secure</span>
                    </div>
                </div> -->
            </div>
        </div>
    </section>


    <!-- Program -->
    <section class="container max-w-screen-xl px-4 md:px-16 md:-mt-12 lg:mb-12" id="program">
        <div class="text-center">
            <h2 class="text-2xl md:text-2xl font-bold text-[#333] mt-2 py-16">
                PROGRAM HEALTHY TRACKER
                <div class="h-1 w-20 bg-green-600 mx-auto mt-4 rounded-full"></div>
            </h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Program Cards -->
            <div class="bg-white border rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition">
                <span class="text-5xl text-[#578669] mb-4 block">
                    <i class="ri-heart-pulse-fill"></i>
                </span>
                <h4 class="font-bold text-xl mb-3">Cek Kesehatan</h4>
                <p class="text-gray-600 mb-4">
                    Memberikan informasi kesehatan dari perhitungan BMI sebagai tolak ukur kesehatan.
                </p>
            </div>

            <div class="bg-white border rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition">
                <span class="text-5xl text-[#578669] mb-4 block">
                    <i class="ri-run-line"></i>
                </span>
                <h4 class="font-bold text-xl mb-3">Olahraga</h4>
                <p class="text-gray-600 mb-4">
                    Membuat pengguna lebih produktivitas dengan melakukan kegiatan olahraga agar badan tetap bugar.
                </p>
            </div>

            <div class="bg-white border rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition">
                <span class="text-5xl text-[#578669] mb-4 block">
                    <i class="ri-boxing-fill"></i>
                </span>
                <h4 class="font-bold text-xl mb-3">Tantangan</h4>
                <p class="text-gray-600 mb-4">
                    Membuat pengguna memiliki target mingguan dengan mengikuti tantangan yang disediakan.
                </p>
            </div>

            <div class="bg-white border rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition">
                <span class="text-5xl text-[#578669] mb-4 block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="m-auto" width="1.1em" height="1.1em" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11 14v8H7a3 3 0 0 1-3-3v-4a1 1 0 0 1 1-1zm8 0a1 1 0 0 1 1 1v4a3 3 0 0 1-3 3h-4v-8zM16.5 2a3.5 3.5 0 0 1 3.163 5H20a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-7V7h-2v5H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h.337A3.5 3.5 0 0 1 4 5.5C4 3.567 5.567 2 7.483 2c1.755-.03 3.312 1.092 4.381 2.934l.136.243c1.033-1.914 2.56-3.114 4.291-3.175zm-9 2a1.5 1.5 0 0 0 0 3h3.143C9.902 5.095 8.694 3.98 7.5 4m8.983 0c-1.18-.02-2.385 1.096-3.126 3H16.5a1.5 1.5 0 1 0-.017-3"/>
                    </svg>
                </span>
                <h4 class="font-bold text-xl mb-3">Tukar Poin</h4>
                <p class="text-gray-600 mb-4">
                    Hasil poin yang telah dikumpulkan dari Tantangan dapat ditukar sesuai syarat dan ketentuan.
                </p>
            </div>
        </div>
    </section>


    <!-- Testimonial -->
    <section class="container max-w-screen-xl px-4 md:px-16 md:mt-12 mb-16" id="program">
        <div class="text-center">
            <h2 class="text-2xl md:text-2xl font-bold text-[#333] mt-2 py-10 lg:pt-12">
                KATA MEREKA
                <div class="h-1 w-20 bg-green-600 mx-auto mt-4 rounded-full"></div>
            </h2>
        </div>
        <div class="bg-gray-100 py-8 mt-8">
            <!-- Testimonial Carousel 1 -->
            <div class="p-6 text-center py-8 px-4 md:px-16 testimonial-item relative" data-index="0">
                <!-- Gambar di Tengah Atas -->
                <div class="flex justify-center mb-6">
                    <img 
                        src="{{ asset('/image/deri j.jpg') }}"
                        class="w-40 h-40 rounded-full border-4 border-gray-300 shadow-md object-cover"
                    >
                </div>

                <!-- Testimonial -->
                <p class="text-gray-600 italic text-lg mb-6 py-4 px-4 md:px-16">
                    <span class="text-3xl">&ldquo;</span>
                    Saya suka sekali fitur video olahraga di Healthy Tracker. Gerakannya jelas, mudah diikuti, dan saya bisa memilih video sesuai dengan waktu dan kebutuhan saya. 
                    Tantangan video membuat saya lebih semangat berolahraga karena ada poin yang bisa ditukar hadiah!
                    <span class="text-3xl">&rdquo;</span>
                </p>
                <h3 class="text-lg font-bold mb-3">Deri Januarta</h3>
                <p class="text-gray-500">Freelancer</p>
            </div>


            <!-- Testimonial Carousel 2 -->
            <div class="p-6 text-center py-8 px-4 md:px-16 testimonial-item hidden" data-index="1">
                <!-- Gambar di Tengah Atas -->
                <div class="flex justify-center mb-6">
                    <img 
                        src="{{ asset('/image/issabela.jpg') }}" 
                        alt="pp" 
                        class="w-40 h-40 rounded-full border-4 border-gray-300 shadow-md object-cover"
                    >
                </div>

                <p class="text-gray-600 italic text-lg mb-6 py-4 px-4 md:px-16">
                    <span class="text-3xl font-serif">&ldquo;</span>
                    Healthy Tracker benar-benar membantu saya menjaga kesehatan. Saya rutin mengecek BMI dan memantau berat badan melalui aplikasi ini. 
                    Tantangan video membuat olahraga terasa seperti permainan, dan poin yang bisa ditukar dengan hadiah menjadi motivasi tambahan.
                    <span class="text-3xl font-serif">&rdquo;</span>
                </p>
                <h3 class="text-lg font-bold mb-3">Isabella Putri</h3>
                <p class="text-gray-500">Pegawai Kantor</p>
            </div>

            <!-- Testimonial Carousel 3 -->
            <div class="p-6 text-center py-8 px-4 md:px-16 testimonial-item hidden" data-index="2">
                <!-- Gambar di Tengah Atas -->
                <div class="flex justify-center mb-6">
                    <img 
                        src="{{ asset('/image/sandita  s.jpg') }}" 
                        alt="pp2" 
                        class="w-40 h-40 rounded-full border-4 border-gray-300 shadow-md object-cover"
                    >
                </div>

                <p class="text-gray-600 italic text-lg mb-6 py-4 px-4 md:px-16">
                    <span class="text-3xl font-serif">&ldquo;</span>
                    Saya suka fitur BMI di Healthy Tracker. Sangat membantu untuk mengetahui apakah berat badan saya sudah ideal. 
                    Selain itu, video olahraga dengan berbagai tingkat kesulitan sangat membantu saya untuk tetap aktif. Aplikasi ini benar-benar mendukung gaya hidup sehat!
                    <span class="text-3xl font-serif">&rdquo;</span>
                </p>
                <h3 class="text-lg font-bold mb-3">Sandita Sari</h3>
                <p class="text-gray-500">Mahasiswi</p>
            </div>

            <!-- Pagination Dots -->
            <div class="flex justify-center space-x-2 mt-8 mb-12">
                <button class="pagination-dot w-3 h-3 bg-green-600 rounded-full" data-index="0"></button>
                <button class="pagination-dot w-3 h-3 bg-gray-300 rounded-full" data-index="1"></button>
                <button class="pagination-dot w-3 h-3 bg-gray-300 rounded-full" data-index="2"></button>
            </div>
        </div>
    </section>


            

    <!-- Contact Section -->
    <section id="contact" class="container max-w-screen-xl mx-auto px-4 md:px-8 mb-20">
        <div class="text-center">
            <h2 class="text-2xl md:text-2xl font-bold text-[#333] mt-2 py-10">
                HUBUNGI KAMI
                <div class="h-1 w-20 bg-green-600 mx-auto mt-4 rounded-full"></div>
            </h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 text-center lg:pt-12">
            <!-- Address -->
            <div class="lg:pr-7">
                <div class="flex justify-center items-center w-16 h-16 mx-auto bg-gray-200 rounded-full">
                    <i class="fas fa-map-marker-alt text-xl text-[#578669] hover:text-[#4b4b4b]"></i>
                </div>
                <h3 class="font-bold text-lg mt-4">Alamat</h3>
                <p class="text-gray-600 mt-2">
                    Jl. Kebon Jeruk No. 123, Jakarta Selatan <br />
                    Indonesia
                </p>
            </div>

            <!-- Phone -->
            <div class="lg:border-l lg:border-gray-300 lg:pl-5">
                <div class="flex justify-center items-center w-16 h-16 mx-auto bg-gray-200 rounded-full">
                    <i class="fas fa-headset text-xl text-[#578669] hover:text-[#4b4b4b]"></i>
                </div>
                <h3 class="font-bold text-lg mt-4">Nomor Telepon</h3>
                <p class="text-gray-600 mt-2">
                    (+62) - 891 - 773 - 167 <br />
                    (+62) - 523 - 820 - 199
                </p>
            </div>

            <!-- Email -->
            <div class="lg:border-l lg:border-gray-300 lg:pl-5">
                <div class="flex justify-center items-center w-16 h-16 mx-auto bg-gray-200 rounded-full">
                    <i class="fas fa-envelope text-xl text-[#578669] hover:text-[#4b4b4b]"></i>
                </div>
                <h3 class="font-bold text-lg mt-4">Email</h3>
                <p class="text-gray-600 mt-2">
                    support@healthytracker.com <br />
                    info_HealTrack@gmail.com
                </p>
            </div>
        </div>
        <!-- CTA Button -->
        <div class="text-center mt-12 lg:ml-5">
            <a href="/LANDPAGE/contactUs" class="inline-block px-8 py-4 bg-[#578669] text-white font-medium rounded-lg hover:bg-[#426351] transition-colors duration-300 shadow-sm hover:shadow-md">
                Hubungi Kami Sekarang
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-gray-100 text-gray-800 py-10">
        <div class="container lg:px-16 mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- HealthyTracker Info -->
                <div>
                    <a href="#" class="flex items-center space-x-2 mb-4">
                        <img src="{{ asset('/image/logo_proyek(1).png') }}" alt="logo" class="h-8">
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

        // Testimonial  slide
        document.addEventListener("DOMContentLoaded", () => {
        const testimonialItems = document.querySelectorAll(".testimonial-item");
        const paginationDots = document.querySelectorAll(".pagination-dot");

        paginationDots.forEach(dot => {
            dot.addEventListener("click", () => {
                const index = dot.getAttribute("data-index");

                // Sembunyikan semua testimonial
                testimonialItems.forEach(item => item.classList.add("hidden"));

                // Tampilkan testimonial yang dipilih
                document.querySelector(`.testimonial-item[data-index="${index}"]`).classList.remove("hidden");

                // Update active dot
                paginationDots.forEach(d => d.classList.replace("bg-green-600", "bg-gray-300"));
                dot.classList.replace("bg-gray-300", "bg-green-600");
            });
        });
    });
    
    </script>
    <!-- About Us and other sections go here (similar to the rest of the HTML) -->
</body>
</html>
