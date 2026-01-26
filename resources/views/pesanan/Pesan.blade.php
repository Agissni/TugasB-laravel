@extends('layouts.app')

@section('content')
{{-- 1. Ganti bg-pink-50 jadi bg-orange-50 (Krem lembut) atau bg-gray-100 --}}
<div class="bg-orange-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        
        {{-- BAGIAN 1: FORM PEMESANAN --}}
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md mx-auto mb-10">
            {{-- 2. Ganti text-pink-600 jadi text-amber-900 (Cokelat Tua Mewah) --}}
            <h2 class="text-2xl font-bold text-center text-amber-900 mb-6">Form Pemesanan</h2>
            
            <form action="{{ url('/pesan') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="nama_customer" placeholder="Nama Anda" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none" required>
                
                <select name="kue_pilihan" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none" required>
                    @foreach($daftarKue as $k)
                        <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                    @endforeach
                </select>

                <input type="number" name="jumlah" placeholder="Jumlah" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none" required>
                <textarea name="alamat" placeholder="Alamat" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none" required></textarea>
                <input type="text" name="no_hp" placeholder="WhatsApp" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none" required>
                
                {{-- 3. Ganti tombol bg-pink-600 jadi bg-amber-700 (Cokelat) --}}
                <button type="submit" class="w-full bg-[#522b05] text-white p-3 rounded-lg font-bold hover:bg-[#3d2004] transition shadow-md">
                Kirim Pesanan
                </button>
            </form>
        </div>

        {{-- BAGIAN 2: TABEL DAFTAR PESANAN --}}
        <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-amber-700">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Daftar Pesanan</h1>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-amber-50"> {{-- Header tabel jadi krem muda --}}
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Nama Customer</th>
                            <th class="border px-4 py-2">Kue</th>
                            <th class="border px-4 py-2">Jumlah</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan as $p)
                        <tr class="text-center hover:bg-gray-50 transition">
                            <td class="border px-4 py-2">{{ $p->id_pesanan }}</td>
                            <td class="border px-4 py-2">{{ $p->nama_customer }}</td>
                            <td class="border px-4 py-2">{{ $p->kue_pilihan }}</td>
                            <td class="border px-4 py-2">{{ $p->jumlah }}</td>
                            <td class="border px-4 py-2">
                               <a href="{{ url('pesanan/' . $p->id_pesanan . '/edit') }}" class="text-amber-600 font-bold hover:underline">Edit</a>
                                <form action="{{ route('pesanan.destroy', $p->id_pesanan) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 font-bold ml-2 hover:underline" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection