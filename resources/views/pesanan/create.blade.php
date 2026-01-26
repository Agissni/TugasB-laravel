@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-[#522b05]">Form Tambah Pesanan</h1>
        <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf
            
            {{-- Nama Customer --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Customer</label>
                <input type="text" name="nama_customer" class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
            </div>

            {{-- Dropdown Pilihan Kue --}}
            <select name="kue_pilihan" class="border rounded w-full py-2 px-3" required>
            <option value="">-- Silahkan Pilih Kue --</option>
            @foreach($daftarKue as $k)
        {{-- Kita panggil $k->nama karena di database nama kolomnya adalah 'nama' --}}
             <option value="{{ $k->nama }}">{{ $k->nama }}</option>
             @endforeach
            </select>
            
            {{-- Jumlah --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Jumlah</label>
                <input type="number" name="jumlah" min="1" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>

            {{-- Alamat --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Alamat</label>
                <textarea name="alamat" class="border rounded w-full py-2 px-3 text-gray-700" rows="3" required></textarea>
            </div>

            {{-- No HP --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">No HP</label>
                <input type="text" name="no_hp" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>

            {{-- Tombol --}}
            <div class="flex items-center justify-between">
             <button type="submit" class="bg-[#522b05] hover:bg-[#fcb69f] active:bg-[#ffecd2] active:text-[#522b05] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full transition duration-200">
             Kirim Pesanan
             </button>
                </div>
        </form>
    </div>
</div>
@endsection

