<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Overlay untuk mobile -->
    <div class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="overlay"></div>

    <!-- Button toggle untuk mobile -->
    <button id="toggleButton" class="lg:hidden absolute top-4 left-4 z-50 p-2 text-black mt-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed -left-64 lg:left-0 transition-all duration-300 w-64 min-h-screen bg-white shadow-lg flex flex-col z-50">
        <div class="flex flex-col h-full">
            <!-- Header -->
            <div class="flex items-center justify-center h-20 shadow-md gap-2">
                <img src="{{ asset('image/logo_proyek(1).png') }}" alt="Logo" class="w-8 h-8">
                <h1 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#9BEC00] to-[#578669]">Healthy Tracker</h1>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="flex-grow px-4 py-6">
                <!-- Dashboard Menu Item (Highlighted) -->
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#CCE3C2] transition-colors
                @if(Route::currentRouteName() == 'user.dashboard') font-bold text-[#578669] @endif ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3 12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm0 8a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1zm1-17a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                
                <!-- Cek Kesehatan Menu Item -->
                <a href="{{ route('kesehatan.index') }}" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#CCE3C2] transition-colors 
                @if(Route::currentRouteName() == 'kesehatan.index' || Route::currentRouteName() == 'kesehatan.bmi' || Route::currentRouteName() == 'kesehatan.bmr') font-bold text-[#578669] @endif ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M7.5 4A5.5 5.5 0 0 0 2 9.5c0 .5.09 1 .22 1.5H6.3l1.27-3.37c.3-.8 1.48-.88 1.86 0L11.5 13l.59-1.42c.13-.33.48-.58.91-.58h8.78c.13-.5.22-1 .22-1.5A5.5 5.5 0 0 0 16.5 4c-1.86 0-3.5.93-4.5 2.34C11 4.93 9.36 4 7.5 4M3 12.5a1 1 0 0 0-1 1a1 1 0 0 0 1 1h2.44L11 20c1 .9 1 .9 2 0l5.56-5.5H21a1 1 0 0 0 1-1a1 1 0 0 0-1-1h-7.6l-.93 2.3c-.4 1.01-1.55.87-1.92.03L8.5 9.5l-.96 2.33c-.15.38-.49.67-.94.67z"/>
                    </svg>
                    <span>Kesehatan</span>
                </a>
                
                <!-- Olahraga Menu Item -->
                <a href="{{ route('olahraga.index') }}" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#CCE3C2] transition-colors 
                @if(Route::currentRouteName() == 'olahraga.index' || Route::currentRouteName() == 'detail_olahraga.show' || Route::currentRouteName() == 'riwayat.olahraga') font-bold text-[#578669] @endif ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12h1m3-4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2m0-9v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m3 5h6m0-5v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1a1 1 0 0 0-1 1m3 1h2a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-2m4-4h-1"/>
                    </svg>
                    <span>Olahraga</span>
                </a>


                <!-- Tantangan -->
                <a href="{{ route('tantangan') }}" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#CCE3C2] transition-colors 
                @if(Route::currentRouteName() == 'tantangan' || Route::currentRouteName() == 'tantangan.detail') font-bold text-[#578669] @endif ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 48 48">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M30.507 36.163h-13.01m0-4.025h13.006m10.054 4.649h.835c.613 0 1.108-.491 1.108-1.104v-3.152c0-.61-.494-1.104-1.104-1.104h-.835m-3.893 8.58h2.786a1.1 1.1 0 0 0 1.103-1.103v-9.59a1.104 1.104 0 0 0-1.1-1.107h-2.785m-1.104-2.355H31.61c-.61 0-1.104.494-1.104 1.104v14.302a1.1 1.1 0 0 0 1.104 1.104h3.957a1.1 1.1 0 0 0 1.104-1.104V26.96a1.104 1.104 0 0 0-1.1-1.108zM7.439 36.791h-.831a1.104 1.104 0 0 1-1.108-1.1v-3.16c0-.612.491-1.104 1.108-1.104h.831m3.893 8.58h-2.79a1.103 1.103 0 0 1-1.103-1.103v-9.59c0-.612.491-1.107 1.104-1.107h2.782m1.107-2.355h3.954c.616 0 1.107.491 1.107 1.108v14.298a1.1 1.1 0 0 1-1.107 1.104h-3.95c-.61 0-1.104-.494-1.104-1.104V26.96c0-.613.492-1.108 1.104-1.108zm8.701 2.82h9.37m-13.01-1.078l1.531-1.538m2.11-4.94h13.25m-20.625-.159l1.41 1.414l3.855-3.874m2.11-4.94h13.25m-20.625-.16l1.41 1.414l3.855-3.87m11.48 28.5H17.496M9.374 28.206V7.849c0-1.225.98-2.211 2.193-2.211h24.87c1.217 0 2.196.983 2.196 2.211v20.358"/>
                    </svg>
                    <span>Tantangan</span>
                </a>
                
                <!-- Hadiah -->
                <a href="{{ route('user_hadiah.index') }}" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#CCE3C2] transition-colors 
                @if(Route::currentRouteName() == 'user_hadiah.index' || Route::currentRouteName() == 'user_hadiah.daftar' || Route::currentRouteName() == 'klaim.index') font-bold text-[#578669] @endif ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 50 50">
                        <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                            <path stroke="currentColor" d="m29.27 35.625l4.063 8.125l4.125-4.23l6.292.063l-5.854-11.625v-.02M20.73 35.625l-4.063 8.125l-4.125-4.23l-6.292.063l5.854-11.625v-.02"/>
                            <path stroke="currentColor" d="M40.167 20.833c0 1.584-1.396 2.917-1.855 4.334c-.458 1.416-.145 3.354-1.041 4.583s-2.813 1.5-3.938 2.417s-2.083 2.625-3.541 3.104c-1.459.479-3.105-.438-4.688-.438s-3.27.896-4.687.438c-1.417-.459-2.313-2.23-3.542-3.104c-1.23-.875-3.146-1.188-4.042-2.417c-.896-1.23-.562-3.125-1.041-4.583c-.48-1.459-1.959-2.75-1.959-4.334s1.396-2.916 1.854-4.333s.146-3.354 1.042-4.583s2.813-1.5 4.042-2.417s1.979-2.625 3.541-3.104c1.563-.48 3.105.437 4.688.437s3.27-.896 4.688-.437C31.104 6.854 32 8.625 33.333 9.5s3.146 1.187 4.042 2.417s.563 3.125 1.042 4.583s1.75 2.75 1.75 4.333M25 14.583a6.25 6.25 0 1 0 0 12.501a6.25 6.25 0 0 0 0-12.5"/>
                        </g>
                    </svg>
                    <span>Hadiah</span>
                </a>

                <!-- Bantuan -->
                 <a href="{{ route('faq.index') }}" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#CCE3C2] transition-colors 
                @if(Route::currentRouteName() == 'faq.index') font-bold text-[#578669] @endif ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-4" width="1.4em" height="1.4em" viewBox="0 0 36 36">
                        <path fill="currentColor" d="M18 2a16 16 0 1 0 16 16A16 16 0 0 0 18 2m-.22 25.85a1.65 1.65 0 1 1 1.65-1.65a1.65 1.65 0 0 1-1.65 1.65m1.37-8.06v1.72a1.37 1.37 0 0 1-1.3 1.36h-.11a1.34 1.34 0 0 1-1.39-1.3v-2.76a1.19 1.19 0 0 1 1.12-1.31c1.57-.12 4.18-.7 4.18-3.25c0-1.83-1.41-3.07-3.43-3.07a5.31 5.31 0 0 0-4 1.92a1.36 1.36 0 0 1-2.35-.9a1.43 1.43 0 0 1 .43-1a7.77 7.77 0 0 1 6-2.69c3.7 0 6.28 2.3 6.28 5.6c0 3.05-1.97 5.09-5.43 5.68" class="clr-i-solid clr-i-solid-path-1"/><path fill="none" d="M0 0h36v36H0z"/>
                    </svg>
                    <span>Bantuan</span>
                </a>
            </nav>
        </div>
    </div>

    <div class="main-content">
        
        @yield('content')
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <footer>
        <!-- Footer content -->
    </footer>

    <script>
        // Notification Popout Toggle
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationPopout = document.getElementById('notificationPopout');

        notificationBtn.addEventListener('click', () => {
            notificationPopout.classList.toggle('hidden');
            settingsPopout.classList.add('hidden'); // Close settings popout
        });

        const settingsBtn = document.getElementById('settingsBtn');
        const profilePopout = document.getElementById('profilePopout');
        const logoutBtn = document.getElementById('logoutBtn');

        // Toggle Profile Popout
        settingsBtn.addEventListener('click', () => {
            profilePopout.classList.toggle('hidden');
        });

        // Profile Button Handler
        profileBtn.addEventListener('click', () => {
            // Logika untuk menampilkan halaman profile
            // Misalnya: 
            // window.location.href = '/profile';
            alert('Menampilkan Profile');
            window.location.href = '{{ route("profile.edit") }}';
            profilePopout.classList.add('hidden');
        });

        // Logout Button
        logoutBtn.addEventListener('click', () => {
            // Tampilkan konfirmasi logout
            const confirmLogout = confirm('Anda yakin ingin keluar dari website?');
            
            if (confirmLogout) {
                // Submit form logout secara otomatis
                document.getElementById('logout-form').submit();
            }
        });

        // Close popout when clicking outside
        document.addEventListener('click', (event) => {
            if (!settingsBtn.contains(event.target) && !profilePopout.contains(event.target)) {
                profilePopout.classList.add('hidden');
            }
        });

        // JavaScript for Auto Sliding
        const slider = document.getElementById('slider');
        const slides = slider.children.length;
        let currentIndex = 0;
    
        function showNextSlide() {
          currentIndex = (currentIndex + 1) % slides;
          slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        }
    
        // Slide every 5 seconds
        setInterval(showNextSlide, 5000);

        var swiper = new Swiper('.swiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // },
        // autoplay: {
        //     delay: 3000, // Slide bergeser otomatis setiap 3 detik
        // },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
        },
    });
    </script>
</body>
</html>