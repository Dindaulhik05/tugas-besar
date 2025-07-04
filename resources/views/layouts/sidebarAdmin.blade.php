<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
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
        <div class="flex flex-col items-center justify-center h-20 shadow-md">
            <div class="flex items-center gap-2">
                <img src="{{ asset('image/logo_proyek(1).png') }}" alt="Logo" class="w-8 h-8">
                <h1 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#9BEC00] to-[#578669]">Healthy Tracker</h1>
            </div>
            <div class="w-full flex justify-start pl-16">
                <p class="text-sm text-gray-500 ml-1">Admin</p>
            </div>
        </div>
        
        <nav class="flex-grow px-4 py-6">
            <!-- Dashboard Menu Item (Highlighted) -->
            <a href="{{ route('Admin.dashboard') }}" 
            class="flex items-center gap-6 px-2 py-3 rounded-lg 
            @if(Route::currentRouteName() == 'Admin.dashboard') font-bold text-[#578669] @endif 
            hover:bg-[#CCE3C2] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm0 8a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1zm1-17a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z"/>
                </svg>
                <span>Dashboard</span>
            </a>
            
            <!-- Cek Kesehatan Menu Item -->
            <a href="{{ route('Admin.konfir_bukti.index') }}" 
            class="flex items-center gap-6 px-2 py-3 rounded-lg 
            @if(Route::currentRouteName() == 'Admin.konfir_bukti.index' || Route::currentRouteName() == 'Admin.konfir_bukti.create') || Route::currentRouteName() == 'Admin.konfir_bukti.edit') font-bold text-[#578669] @endif 
            hover:bg-[#CCE3C2] transition-colors">
                <svg class="ml-3" width="1.5em" height="1.5em" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Konfirmasi Bukti</span>
            </a>

            <!-- Olahraga Menu Item -->
            <a href="{{ route('admin.olahraga.index') }}" 
            class="flex items-center gap-6 px-2 py-3 rounded-lg 
            @if(Route::currentRouteName() == 'admin.olahraga.index' || Route::currentRouteName() == 'olahraga.create' || Route::currentRouteName() == 'olahraga.edit') font-bold text-[#578669] @endif 
            hover:bg-[#CCE3C2] transition-colors">
            <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M11 20H4q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v4q0 .425-.288.713T21 11t-.712-.288T20 10V6H4v12h7q.425 0 .713.288T12 19t-.288.713T11 20m-1.5-4.875v-6.25q0-.45.388-.663t.762.038l4.875 3.125q.35.225.35.625t-.35.625L10.65 15.75q-.375.25-.763.038t-.387-.663m8.275 7.475l-.225-1.1q-.3-.125-.563-.262t-.537-.338l-1.075.325q-.175.05-.325-.012T14.8 21l-.6-1q-.1-.15-.05-.325t.175-.3l.825-.725q-.05-.35-.05-.65t.05-.65l-.825-.725q-.125-.125-.175-.3T14.2 16l.6-1q.1-.15.25-.212t.325-.013l1.075.325q.275-.2.538-.337t.562-.263l.225-1.1q.05-.175.163-.288T18.25 13h1.2q.2 0 .313.113t.162.287l.225 1.1q.3.125.563.275t.537.375l1.05-.375q.175-.05.338.013T22.9 15l.6 1.05q.1.15.063.325t-.163.3l-.85.725q.05.3.05.625t-.05.625l.825.725q.125.125.175.3T23.5 20l-.6 1q-.1.15-.25.213t-.325.012L21.25 20.9q-.275.2-.537.338t-.563.262l-.225 1.1q-.05.175-.162.288T19.45 23h-1.2q-.2 0-.312-.112t-.163-.288M18.85 20q.825 0 1.413-.587T20.85 18t-.587-1.412T18.85 16t-1.412.588T16.85 18t.588 1.413T18.85 20"/>
            </svg>
                <span>Kelola Olahraga</span>
            </a>

            <!-- Tantangan Menu Item -->
            <a href="{{ route('kelola_tantangan.index') }}" 
            class="flex items-center gap-6 px-2 py-3 rounded-lg 
            @if(Route::currentRouteName() == 'kelola_tantangan.index' || Route::currentRouteName() == 'kelola_tantangan.create' || Route::currentRouteName() == 'kelola_tantangan.edit') font-bold text-[#578669] @endif 
            hover:bg-[#CCE3C2] transition-colors">
                <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><g fill="none"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M12 2c.896 0 1.764.118 2.59.339l-2.126 2.125A3 3 0 0 0 12.04 5H12a7 7 0 1 0 7 7v-.04q.29-.18.535-.425l2.126-2.125c.221.826.339 1.694.339 2.59c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m-.414 5.017c0 .851-.042 1.714.004 2.564l-.54.54a2 2 0 1 0 2.829 2.829l.54-.54c.85.046 1.712.004 2.564.004a5 5 0 1 1-5.397-5.397m6.918-4.89a1 1 0 0 1 .617.923v1.83h1.829a1 1 0 0 1 .707 1.707L18.12 10.12a1 1 0 0 1-.707.293H15l-1.828 1.829a1 1 0 0 1-1.415-1.415L13.586 9V6.586a1 1 0 0 1 .293-.708l3.535-3.535a1 1 0 0 1 1.09-.217"/></g></svg>
                <span>Kelola Tantangan</span>
            </a>

            <!-- Olahraga Menu Item -->
            <a href="{{ route('hadiah.index') }}" 
            class="flex items-center gap-6 px-2 py-3 rounded-lg 
            @if(Route::currentRouteName() == 'hadiah.index' || Route::currentRouteName() == 'hadiah.create' || Route::currentRouteName() == 'hadiah.edit') font-bold text-[#578669] @endif 
            hover:bg-[#CCE3C2] transition-colors">
                <svg class="ml-3" width="1.5em" height="1.5em" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                </svg>
                <span>Kelola Hadiah</span>
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
            window.location.href = '{{ route("admin.profile.index") }}';
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
    </script>
</body>
</html>
