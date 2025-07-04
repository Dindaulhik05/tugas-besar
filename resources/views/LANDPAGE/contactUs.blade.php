<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-[#F9FAFB]">
     <!-- Button Toggle untuk Mobile -->
    <button id="mobile-menu-toggle" class="md:hidden absolute top-5 left-4 z-50">
        <i class="ri-menu-line text-2xl"></i>
    </button>

    <!-- Navigasi -->
    <nav id="main-nav" class="ixed top-0 left-0 bottom-0 w-64 bg-white shadow-sm transform -translate-x-full transition-transform duration-300 ease-in-out 
        md:sticky md:translate-x-0 md:flex md:justify-between md:items-center md:px-16 md:py-4 md:shadow-sm md:w-full z-40">
        <button id="mobile-menu-close" class="md:hidden absolute top-4 right-4">
            <i class="ri-close-line text-2xl"></i>
        </button>
        <div class="nav__logo flex justify-center md:block mt-16 md:mt-0">
            <a href="/LANDING_PAGE/lendingpage.php" class="flex items-center space-x-2">
                <img src="{{ asset ('/image/logo_proyek(1).png') }}" alt="logo" class="h-9" />
                <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#9BEC00] to-[#578669]">Healthy Tracker</h4>
            </a>
        </div>

        <ul class="flex flex-col md:flex-row items-center justify-center space-y-6 md:space-y-0 md:space-x-8 h-full md:h-auto">
            <li><a href="/LANDPAGE/landingpage" class="text-black hover:text-[#578669]">Home</a></li>
            <li><a href="/LANDPAGE/about" class="text-[#578669] hover:text-[#578669]">Tentang</a></li>
            <li><a href="/LANDPAGE/contactUS" class="text-black hover:text-[#578669]">Hubungi</a></li> 
            <li>
                <a href="{{ url('/login') }}" class="bg-[#578669] text-white px-6 py-2 rounded-full hover:bg-[#598066] transition">
                    Login
                </a>
            </li>
        </ul>
    </nav>

    <!-- Overlay semi-transparan untuk Nav Mobile-->
    <div id="nav-overlay" class="fixed inset-0 bg-black opacity-0 invisible transition-all duration-300 z-30 md:hidden"></div>

    <!-- Contact Us Section -->
    <section class="bg-gray-100 py-20">
        <div class="container mx-auto lg:px-16 grid grid-cols-1 md:grid-cols-2 gap-12 px-4">
            <!-- Left Content -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Hubungi Kami</h1>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">No Telepon</h3>
                    <i class="fas fa-phone text-[#578669] hover:text-[#4b4b4b] w-6"></i>
                    <span class="text-gray-400 hover:text-[#578669]">+62 123 4567 890</span>
                </div>
                <div class="mt-5">
                    <h3 class="font-semibold text-gray-800 mb-2">Email</h3>
                    <ul class="space-y-1">
                        <li>
                            <i class="fas fa-envelope text-[#578669] hover:text-[#4b4b4b] w-6"></i>
                            <span><a href="mailto:support@healthytracker.com" class="text-gray-400 hover:underline">support@healthytracker.com</a></span>
                        </li>
                        <li>
                            <i class="fas fa-envelope text-[#578669] hover:text-[#4b4b4b] w-6"></i>
                            <span><a href="mailto:business@healthytracker.com" class="text-gray-400 hover:underline">business@healthytracker.com</a></span>
                        </li>
                    </ul>
                </div>
                <div class="mt-5">
                    <h3 class="font-semibold text-gray-800 mb-2">Alamat</h3>
                    <i class="fas fa-map-marker-alt text-[#578669] hover:text-[#4b4b4b] w-6"></i>
                    <span class=" text-gray-400 hover:text-[#578669]">Jl. Kebon Jeruk No. 123, Jakarta Barat, Indonesia</span>
                </div>

                <!-- Additional Information -->
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">Dukungan Pelanggan</h3>
                        <p class="text-gray-600">Tim kami tersedia sepanjang waktu untuk membantu menyelesaikan setiap masalah atau pertanyaan yang Anda miliki.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">Masukan dan Saran</h3>
                        <p class="text-gray-600">Kami menghargai masukan Anda dan terus bekerja untuk meningkatkan layanan kami.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">Pertanyaan Media</h3>
                        <p class="text-gray-600">Untuk pertanyaan terkait media, silakan hubungi kami melalui email.</p>
                    </div>
                </div>
            </div>

            <!-- Right Content (Form) -->
            <div class="bg-white shadow-lg rounded-lg p-7">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Ada Pertanyaan? Hubungi Kami Sekarang!</h2>
                <form id="contactForm" action="#" method="POST" class="space-y-6">
                    <!-- First Name -->
                    <div class="flex flex-col">
                        <label for="firstName" class="text-gray-700 font-medium">Nama</label>
                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#578669] focus:border-transparent"
                            placeholder="Masukan nama"
                            required
                        >
                    </div>
                    

                    <!-- Email -->
                    <div class="flex flex-col">
                        <label for="email" class="text-gray-700 font-medium">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#578669] focus:border-transparent"
                            placeholder="Masukan email"
                            required
                        >
                    </div>

                    <!-- Phone Number -->
                    <div class="flex flex-col">
                        <label for="phone" class="text-gray-700 font-medium">Nomor Telepon</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#578669] focus:border-transparent"
                            placeholder="Masukan nomor telepon"
                        >
                    </div>

                    <!-- Message -->
                    <div class="flex flex-col">
                        <label for="message" class="text-gray-700 font-medium">Pesan</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#578669] focus:border-transparent resize-none"
                            placeholder="Masukan pesan"
                            required
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button
                            type="submit"
                            id="openModalButton"
                            class="bg-[#578669] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#4b6b7b] transition duration-300"
                        >
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Konfirmasi -->
        <div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-lg font-bold mb-4">Apakah Anda yakin mengirim pesan ini?</h2>
                <div class="flex justify-center space-x-4">
                    <button id="confirmButton" class="bg-[#578669] text-white font-semibold px-4 py-2 rounded-lg hover:bg-[#4b6b7b]">Ya</button>
                    <button id="cancelButton" class="bg-gray-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-gray-700">Tidak</button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Map Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto lg:px-16 grid grid-cols-1 md:grid-cols-2 gap-12 px-4">
            <!-- Map -->
            <div>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.08080652679!2d106.71967603230381!3d-6.283929460552227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1ec2422b0b3%3A0x39a0d0fe47404d02!2sJakarta%20Selatan%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1734186641477!5m2!1sid!2sid"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>

            <!-- Location Info -->
            <div>
                <h3 class="text-gray-600 font-medium uppercase">Lokasi Kami</h3>
                <h2 class="text-3xl font-bold text-gray-900 mt-2">Menyatukan dari Dekat hingga Jauh</h2>
                <p class="mt-4 text-gray-600">
                    <strong>Headquarters</strong><br>
                    PT. Healthy Tracker<br>
                    Gedung Graha Mandiri Lantai 5<br>
                    Jalan Kebon Jeruk No. 123, Kav. 50-51<br>
                    Jakarta Selatan 10220, Indonesia
                </p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Lihat di Google Maps →</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-100 text-gray-800 py-10">
        <div class="container lg:px-16 mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- HealthyTracker Info -->
                <div>
                    <a href="" class="flex items-center space-x-2 mb-4">
                        <img src="{{ asset('logo_proyek(1).png') }}" alt="logo" class="h-10">
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

    <!-- JavaScript -->
     <script>
        // Ambil elemen-elemen yang diperlukan
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mainNav = document.getElementById('main-nav');
        const navOverlay = document.getElementById('nav-overlay');

        // Fungsi untuk membuka menu
        function openMenu() {
            mainNav.classList.remove('-translate-x-full'); // Menampilkan navigasi
            navOverlay.classList.remove('invisible', 'opacity-0'); // Menampilkan overlay
            navOverlay.classList.add('opacity-50'); // Menambahkan efek transparansi
        }

        // Fungsi untuk menutup menu
        function closeMenu() {
            mainNav.classList.add('-translate-x-full'); // Menyembunyikan navigasi
            navOverlay.classList.add('invisible', 'opacity-0'); // Menyembunyikan overlay
            navOverlay.classList.remove('opacity-50'); // Menghapus efek transparansi
        }

        // Event listener untuk membuka menu
        mobileMenuToggle.addEventListener('click', openMenu);

        // Event listener untuk menutup menu
        mobileMenuClose.addEventListener('click', closeMenu);

        // Menutup menu saat overlay diklik
        navOverlay.addEventListener('click', closeMenu);

        // Referensi elemen
        const openModalButton = document.getElementById('openModalButton');
        const confirmationModal = document.getElementById('confirmationModal');
        const confirmButton = document.getElementById('confirmButton');
        const cancelButton = document.getElementById('cancelButton');
        const contactForm = document.getElementById('contactForm');

        // Buka modal
        openModalButton.addEventListener('click', () => {
            event.preventDefault();
            confirmationModal.classList.remove('hidden');
        });

        // Tutup modal
        cancelButton.addEventListener('click', () => {
            confirmationModal.classList.add('hidden');
        });

        // Kirim formulir jika dikonfirmasi
        confirmButton.addEventListener('click', () => {
            confirmationModal.classList.add('hidden'); // Tutup modal
            contactForm.reset();
            setTimeout(() => {
                alert('Pesan berhasil dikirim!'); // Tampilkan alert setelah modal tertutup
            }, 100); // Delay 200ms untuk memastikan modal tertutup sepenuhnya
        });
     </script>
</body>
</html>
