@extends('layouts.app')

@section('content')
{{-- 1. Ganti bg-pink-50 jadi bg-orange-50 (Krem lembut) atau bg-gray-100 --}}
<div class="bg-orange-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        
        {{-- BAGIAN 1: FORM PEMESANAN --}}
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md mx-auto mb-10">
            {{-- 2. Ganti text-pink-600 jadi text-amber-900 (Cokelat Tua Mewah) --}}
            <h2 class="text-2xl font-bold text-center text-amber-900 mb-6">Form Pemesanan</h2>
            
            <form action="{{ route('pesanan.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="nama_customer" placeholder="Nama Anda" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none" required>
                
                <select name="kue_pilihan" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none" required>
                    <option value="">-- Silahkan Pilih Kue --</option>
                    @if(count($daftarKue) > 0)
                        @foreach($daftarKue as $k)
                            <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>Data kue tidak tersedia</option>
                    @endif
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

    </div>
</div>
@endsection

@push('scripts')
<script>
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonColor: '#fbbf24'
        });
    @endif
</script>
@endpush