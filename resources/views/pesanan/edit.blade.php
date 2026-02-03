@extends('layouts.app')

@section('content')
<div class="bg-orange-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-2xl mx-auto">
            {{-- Judul Cokelat Tua --}}
            <h2 class="text-2xl font-bold text-amber-900 mb-6">Edit Pesanan</h2>
            
            <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Customer</label>
                    <input type="text" name="nama_customer" value="{{ $pesanan->nama_customer }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kue Pilihan</label>
                    <select name="kue_pilihan" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                        @foreach($daftarKue as $k)
                            <option value="{{ $k->nama_kue }}" {{ $pesanan->kue_pilihan == $k->nama_kue ? 'selected' : '' }}>
                                {{ $k->nama_kue }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jumlah</label>
                    <input type="number" name="jumlah" value="{{ $pesanan->jumlah }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" rows="3" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">{{ $pesanan->alamat }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">No HP / WhatsApp</label>
                    <input type="text" name="no_hp" value="{{ $pesanan->no_hp }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                </div>
                
                {{-- Tombol Cokelat Tua (Senada Navbar) --}}
                <div class="flex gap-3">
                    <button type="submit" class="bg-[#522b05] text-white px-6 py-3 rounded-lg font-bold hover:bg-[#3d2004] transition shadow-md">
                        Update Pesanan
                    </button>
                    <a href="{{ route('pesanan.index') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-bold hover:bg-gray-300 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection