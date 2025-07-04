@extends('layouts.sidebarUser')

@section('title', 'Bantuan')

@section('content')
<div class="flex flex-col min-h-screen">
    <div id="mainContent" class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
        <!-- Header -->
         <!-- Header -->
        <div class="flex justify-between items-center mb-8"> 
            <div>
                <h1 class="lg:text-2xl font-bold text-gray-800 -mt-5 pt-5 hidden md:block">Bantuan</h1>
            </div>

            @include('layouts.notif_setting')
        </div>

         <!-- FAQ Section -->
    <div class="bg-white p-8 rounded-2xl mb-8 text-gray-800 shadow-2xl relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-tr from-white/20 via-transparent to-white/20 pointer-events-none"></div>
    <h3 class="relative mb-8 font-extrabold text-2xl text-center drop-shadow-lg">
        ❓ Frequently Asked Questions (FAQ)
    </h3>
    <ul class="relative list-none space-y-6 z-10">
            <!-- FAQ Item -->
            <li class="rounded-xl overflow-hidden shadow-lg bg-white transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl">
                <button 
                    class="w-full text-left p-6 flex justify-between items-center text-gray-900 font-medium bg-[#d4e8db] transition duration-200 hover:bg-[#c1d9cc]"
                    onclick="toggleFaq(0)">
                    <span class="font-semibold text-lg">Bagaimana menghitung poin?</span>
                    <span class="text-gray-700 text-xl transform transition-transform duration-300" id="icon-0">▼</span>
                </button>
                <div class="hidden bg-gradient-to-b from-gray-50 to-white px-8 py-6 text-sm text-gray-700 border-t border-gray-200 transition-all duration-300 ease-in-out" id="faq-0">
                    <ul class="list-disc pl-6 space-y-4">
                        <li><strong class="text-[#578669]">Menyelesaikan Workout:</strong> Anda mendapatkan poin setelah menyelesaikan seluruh sesi workout yang dipandu oleh video.</li>
                        <li><strong class="text-[#578669]">Durasi Workout:</strong> Semakin lama durasi workout yang diselesaikan, semakin banyak poin yang diperoleh.</li>
                        <li><strong class="text-[#578669]">Jenis Workout:</strong> Workout dengan intensitas lebih tinggi, seperti HIIT atau strength training, mungkin memberikan lebih banyak poin dibanding workout ringan.</li>
                        <li><strong class="text-[#578669]">Konsistensi:</strong> Jika Anda melakukan workout secara rutin (misalnya, setiap hari atau beberapa kali seminggu), Anda bisa mendapatkan poin bonus.</li>
                    </ul>
                </div>
            </li>

            <!-- FAQ Item -->
            <li class="rounded-xl overflow-hidden shadow-lg bg-white transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl">
                <button 
                    class="w-full text-left p-6 flex justify-between items-center text-gray-900 font-medium bg-[#d4e8db] transition duration-200 hover:bg-[#c1d9cc]"
                    onclick="toggleFaq(1)">
                    <span class="font-semibold text-lg">Bagaimana cara memulihkan kata sandi yang lupa?</span>
                    <span class="text-gray-700 text-xl transform transition-transform duration-300" id="icon-1">▼</span>
                </button>
                <div class="hidden bg-gradient-to-b from-gray-50 to-white px-8 py-6 text-sm text-gray-700 border-t border-gray-200 transition-all duration-300 ease-in-out" id="faq-1">
                    <ol class="list-decimal pl-6 space-y-4">
                        <li>Buka aplikasi atau situs web <em class="text-[#578669] font-medium">healthy tracker</em>.</li>
                        <li>Di halaman masuk, klik <strong class="text-[#578669]">"Lupa Kata Sandi"</strong>.</li>
                        <li>Masukkan alamat email yang terhubung dengan akun Anda.</li>
                        <li>Periksa kotak masuk email Anda untuk tautan pemulihan.</li>
                        <li>Klik tautan tersebut dan ikuti petunjuk untuk membuat kata sandi baru.</li>
                    </ol>
                </div>
            </li>

            <!-- FAQ Item -->
            <li class="rounded-xl overflow-hidden shadow-lg bg-white transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl">
                <button 
                    class="w-full text-left p-6 flex justify-between items-center text-gray-900 font-medium bg-[#d4e8db] transition duration-200 hover:bg-[#c1d9cc]"
                    onclick="toggleFaq(2)">
                    <span class="font-semibold text-lg">Bagaimana cara mengatur ulang kata sandi?</span>
                    <span class="text-gray-700 text-xl transform transition-transform duration-300" id="icon-2">▼</span>
                </button>
                <div class="hidden bg-gradient-to-b from-gray-50 to-white px-8 py-6 text-sm text-gray-700 border-t border-gray-200 transition-all duration-300 ease-in-out" id="faq-2">
                    <ol class="list-decimal pl-6 space-y-4">
                        <li>Masuk ke akun Anda.</li>
                        <li>Buka menu <strong class="text-[#578669]">Pengaturan Akun</strong> atau <strong class="text-[#578669]">Keamanan</strong>.</li>
                        <li>Pilih opsi <strong class="text-[#578669]">Ubah Kata Sandi</strong>.</li>
                        <li>Masukkan kata sandi lama Anda.</li>
                        <li>Buat kata sandi baru (gunakan kombinasi huruf, angka, dan simbol untuk keamanan).</li>
                        <li>Simpan perubahan.</li>
                    </ol>
                </div>
            </li>

            <!-- FAQ Item -->
            <li class="rounded-xl overflow-hidden shadow-lg bg-white transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl">
                <button 
                    class="w-full text-left p-6 flex justify-between items-center text-gray-900 font-medium bg-[#d4e8db] transition duration-200 hover:bg-[#c1d9cc]"
                    onclick="toggleFaq(3)">
                    <span class="font-semibold text-lg">Bagaimana cara menghapus akun saya?</span>
                    <span class="text-gray-700 text-xl transform transition-transform duration-300" id="icon-3">▼</span>
                </button>
                <div class="hidden bg-gradient-to-b from-gray-50 to-white px-8 py-6 text-sm text-gray-700 border-t border-gray-200 transition-all duration-300 ease-in-out" id="faq-3">
                    <ol class="list-decimal pl-6 space-y-4">
                        <li>Masuk ke akun Anda.</li>
                        <li>Kunjungi halaman <strong class="text-[#578669]">Pengaturan Akun</strong>.</li>
                        <li>Pilih opsi <strong class="text-[#578669]">Hapus Akun</strong> di bagian bawah.</li>
                        <li>Konfirmasi penghapusan dengan memasukkan kata sandi Anda.</li>
                        <li>Baca informasi penting terkait penghapusan akun.</li>
                        <li>Jika yakin, klik <strong class="text-[#578669]">Hapus Akun</strong>.</li>
                    </ol>
                </div>
            </li>
        </ul>
    </div>

    <!-- Support Section -->
<div class="bg-gradient-to-r from-green-200 via-white to-gray-100 p-6 rounded-lg flex flex-wrap md:flex-nowrap items-center space-y-4 md:space-y-0 md:space-x-8 text-gray-800 shadow-md relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-tr from-white/20 via-transparent to-white/20 pointer-events-none"></div>
    
    <h3 class="relative w-full md:w-auto font-extrabold text-lg text-center md:text-left z-10">
        Bantuan & Dukungan
    </h3>

    <div class="relative flex flex-col md:flex-row md:items-center md:space-x-6 w-full md:w-auto text-center md:text-left z-10">
        <p class="font-semibold">📞 +123 45 678 9</p>
        <p class="font-semibold">✉ healthytracker@email.com</p>
    </div>
</div>



        </div>

        <!-- Script untuk toggle sidebar -->
<script>
    function toggleFaq(index) {
        const faq = document.getElementById(`faq-${index}`);
        const icon = document.getElementById('icon-${index}');
        
        if (faq.classList.contains("hidden")) {
            faq.classList.remove("hidden"); // Tampilkan FAQ
            faq.classList.add("block"); // Pastikan muncul di layar
            icon.textContent = "▲"; // Ubah ikon menjadi panah ke atas
        } else {
            faq.classList.add("hidden"); // Sembunyikan FAQ
            faq.classList.remove("block"); // Pastikan dihilangkan dari layar
            icon.textContent = "▼"; // Ubah ikon menjadi panah ke bawah
        }
    }
</script>

        
@include('layouts.footerUser')
@endsection