<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-orange-50 flex flex-col min-h-screen"> {{-- Background krem & struktur flex --}}
    
    <nav class="bg-[#522b05] p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-xl font-bold">🕌 La Dolce Raya</a>
            <div class="font-semibold">
                <a href="{{ route('pesanan.index') }}" class="text-orange-100 mr-4 hover:text-white transition">Daftar Pesanan</a>
                <a href="{{ route('pesanan.create') }}" class="text-orange-100 hover:text-white transition">Tambah Pesanan</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-[#522b05] border-t-4 border-[#fcb69f] text-orange-100 text-center p-6">
        <p>&copy; 2026 La Dolce Raya. Semua hak dilindungi.</p>
    </footer>

</body>
</html>