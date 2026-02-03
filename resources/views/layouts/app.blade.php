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
            <div class="font-semibold flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="text-orange-100 mr-4 hover:text-white transition">Dashboard</a>
                <a href="{{ route('pesanan.index') }}" class="text-orange-100 mr-4 hover:text-white transition">Daftar Pesanan</a>
                <a href="{{ route('pesanan.create') }}" class="text-orange-100 hover:text-white transition">Tambah Pesanan</a>

                {{-- Jika admin sudah login tampilkan tombol logout di navbar --}}
                @if(session('role') === 'admin' || (auth()->check() && (auth()->user()->is_admin ?? false)))
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="ml-4 bg-white/10 text-orange-100 px-3 py-1 rounded-md hover:bg-white/20 transition text-sm">Logout</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4 flex-grow">
        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-[#522b05] border-t-4 border-[#fcb69f] text-orange-100 text-center p-6">
        <p>&copy; 2026 La Dolce Raya. Semua hak dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts') 
</body>
</html>