@extends('layouts.app')

@section('content')
<div class="bg-orange-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-amber-700">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Dashboard — Manajemen Pesanan</h1>

                <div class="flex items-center gap-4">
                    <div class="text-sm text-gray-600">Total pesanan: <span class="font-bold">{{ $total ?? 0 }}</span></div>

                    {{-- tombol Logout hanya untuk admin (session/auth) --}}
                    @if(session('role') === 'admin' || (auth()->check() && (auth()->user()->is_admin ?? false)))
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-50 text-red-700 border border-red-100 px-3 py-2 rounded-md font-medium hover:bg-red-100 transition">Logout</button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-amber-50 text-left">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Nama Customer</th>
                            <th class="border px-4 py-2">Kue</th>
                            <th class="border px-4 py-2">Jumlah</th>
                            <th class="border px-4 py-2">Alamat</th>
                            <th class="border px-4 py-2">No. HP</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesanan as $p)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border px-4 py-2">{{ $p->id }}</td>
                            <td class="border px-4 py-2">{{ $p->nama_customer }}</td>
                            <td class="border px-4 py-2">{{ $p->kue_pilihan }}</td>
                            <td class="border px-4 py-2">{{ $p->jumlah }}</td>
                            <td class="border px-4 py-2">{{ $p->alamat }}</td>
                            <td class="border px-4 py-2">{{ $p->no_hp }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('pesanan.edit', $p->id) }}" class="text-amber-600 font-bold hover:underline">Edit</a>
                                <form action="{{ route('pesanan.destroy', $p->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 font-bold ml-2 hover:underline" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-gray-500">Belum ada pesanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-between items-center">
                <a href="{{ route('pesanan.create') }}" class="bg-[#522b05] text-white px-6 py-3 rounded-full font-bold hover:bg-[#3d2004] transition">Tambah Pesanan</a>
                <a href="/" class="text-sm text-gray-600 hover:underline">Kembali ke situs publik</a>
            </div>
        </div>
    </div>
</div>
@endsection