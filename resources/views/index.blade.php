
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Dolce Raya - Toko Kue Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .hero-bg {
            background: linear-gradient(rgba(253, 210, 166, 0.6), rgba(82, 43, 5, 0.73)), url('kue_semua.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .navbar-gradient {
            background: linear-gradient(to right, #ffecd2, #fcb69f);
        }
    </style>
</head>
<body class="bg-orange-50 font-sans text-gray-800">

    <nav x-data="{ open: false }" class="navbar-gradient sticky top-0 z-50 shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-800 flex items-center gap-2">
                <span>🕌 🍪 ✨ La Dolce Raya</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="font-semibold text-gray-700 hover:text-[#522b05] transition">Beranda</a>
                <a href="#menu" class="font-semibold text-gray-700 hover:text-[#522b05] transition">Menu</a>
                <a href="#about" class="font-semibold text-gray-700 hover:text-[#522b05] transition">Tentang Kami</a>
                <a href="#contact" class="font-semibold text-gray-700 hover:text-[#522b05] transition">Kontak</a>
            </div>

            <button @click="open = !open" class="md:hidden focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>

        <div x-show="open" class="md:hidden bg-[#ffecd2] border-t border-orange-200 pb-4 px-4 space-y-3 pt-4">
            <a @click="open = false" href="#home" class="block font-semibold">Beranda</a>
            <a @click="open = false" href="#menu" class="block font-semibold">Menu</a>
            <a @click="open = false" href="#about" class="block font-semibold">Tentang Kami</a>
            <a @click="open = false" href="#contact" class="block font-semibold">Kontak</a>
            <a href="{{ route('pesanan.create') }}" class="block bg-[#522b05] text-white text-center py-2 rounded-full font-bold">Pesan Sekarang</a>
        </div>
    </nav>

    <section id="home" class="hero-bg h-screen flex items-center justify-center text-center px-4">
        <div class="max-w-3xl">
            <h1 class="text-5xl md:text-7xl font-bold text-white drop-shadow-2xl mb-4">La Dolce Raya</h1>
            <p class="text-xl md:text-2xl text-orange-50 font-medium drop-shadow-lg">Rayakan Lebaranmu dengan Kue Berkualitas!</p>
            <a href="#menu" class="inline-block mt-8 bg-[#522b05] text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-[#3d1f03] transition-all transform hover:scale-105 shadow-xl">
                Lihat Menu
            </a>
        </div>
    </section>

    <section id="menu" class="py-24 bg-[#fdf2e9]">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16 text-[#522b05]">Menu Kue Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:-translate-y-3 transition-transform duration-300 flex flex-col">
                    <img src="https://i.pinimg.com/736x/20/85/71/20857151b59c16adf380de94e716de7e.jpg" class="w-full h-64 object-cover" alt="Nastar">
                    <div class="p-8 text-center flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-[#522b05]">Kue Nastar</h3>
                            <p class="text-gray-500 mt-2">Nastar klasik dengan butter wisman premium.</p>
                            <p class="text-[#d4a373] font-bold text-xl my-4">Rp 85k - 110k</p>
                        </div>
                        <a href="{{ route('pesanan.create') }}" class="bg-[#522b05] text-white py-3 rounded-2xl font-bold hover:bg-[#fcb69f] active:bg-[#ffecd2] active:text-[#522b05] transition-all duration-200 shadow-md text-center block">Pesan</a>
                    </div>
                </div>
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:-translate-y-3 transition-transform duration-300 flex flex-col">
                    <img src="https://i.pinimg.com/736x/ac/75/fe/ac75fe78dbdf85f6b1a12c705dbd5b7e.jpg" class="w-full h-64 object-cover" alt="Kastangel">
                    <div class="p-8 text-center flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-[#522b05]">Kue Kastangel</h3>
                            <p class="text-gray-500 mt-2">Keju edam dan cheddar yang melimpah.</p>
                            <p class="text-[#d4a373] font-bold text-xl my-4">Rp 90k - 120k</p>
                        </div>
                        <a href="{{ route('pesanan.create') }}" class="bg-[#522b05] text-white py-3 rounded-2xl font-bold hover:bg-[#fcb69f] active:bg-[#ffecd2] active:text-[#522b05] transition-all duration-200 shadow-md text-center block">Pesan</a>
                    </div>
                </div>
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:-translate-y-3 transition-transform duration-300 flex flex-col">
                    <img src="https://i.pinimg.com/736x/ac/75/fe/ac75fe78dbdf85f6b1a12c705dbd5b7e.jpg" class="w-full h-64 object-cover" alt="Kastangel">
                    <div class="p-8 text-center flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-[#522b05]">Kue Putri Salju</h3>
                            <p class="text-gray-500 mt-2">Lembut, gurih, dan manis yang pas.</p>
                            <p class="text-[#d4a373] font-bold text-xl my-4">Rp 75k - 95k</p>
                        </div>
                        <a href="{{ route('pesanan.create') }}" class="bg-[#522b05] text-white py-3 rounded-2xl font-bold hover:bg-[#fcb69f] active:bg-[#ffecd2] active:text-[#522b05] transition-all duration-200 shadow-md text-center block">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 bg-white">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <h2 class="text-4xl font-bold text-[#522b05]">Tentang Kami</h2>
                <div class="w-12 h-1.5 bg-[#fcb69f] rounded-full my-6"></div>
                <p class="text-lg text-gray-700 leading-relaxed mb-4">
                    Kami menggunakan bahan-bahan premium dan resep turun-temurun untuk memastikan setiap gigitan kue kami memberikan kebahagiaan.
                </p>
                <p class="text-gray-500 italic">"Kualitas dan rasa adalah prioritas utama kami."</p>
            </div>
        </div>
    </section>

    <section id="contact" class="py-24 bg-[#fdf2e9]">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-[#522b05] mb-6">Hubungi Kami</h2>
            <p class="text-gray-600 mb-12 max-w-2xl mx-auto">Ada pertanyaan atau ingin pesan khusus? Tim kami siap melayani Anda melalui WhatsApp atau datang langsung ke workshop kami.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="bg-white p-8 rounded-3xl shadow-md">
                    <h3 class="font-bold text-xl mb-2 text-[#522b05]">Lokasi Workshop</h3>
                    <p class="text-gray-600">Jl. Sariasih No. 54, Sarijadi, Kecamatan Sukasari, Kota Bandung</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-md">
                    <h3 class="font-bold text-xl mb-2 text-[#522b05]">WhatsApp</h3>
                    <p class="text-gray-600">+62 831-9445-7799</p>
                </div>
            </div>

            <a href="https://wa.me/6283194457799" class="inline-flex items-center gap-3 mt-12 bg-green-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-green-700 transition shadow-lg">
                Chat Sekarang via WhatsApp
            </a>
        </div>
    </section>

    <footer class="bg-[#522b05] py-10 text-center text-orange-100">
        <p class="font-medium">&copy; 2026 La Dolce Raya. Dibuat dengan ❤️</p>
    </footer>

</body>
</html>