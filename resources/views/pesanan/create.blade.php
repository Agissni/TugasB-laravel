@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-[#522b05]">Form Tambah Pesanan</h1>
        <form action="{{ route('pesanan.store') }}" method="POST" x-data="{
            hargaKecil: {{ $kueData->harga_kecil ?? 0 }},
            hargaBesar: {{ $kueData->harga_besar ?? 0 }},
            ukuran: '',
            harga: 0,
            jumlah: 1,
            showTotal: false,
            get total() {
                return this.harga * this.jumlah;
            },
            formatRupiah(angka) {
                if (angka === 0) return 'Rp 0';
                return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            },
            updateHarga() {
                if (this.ukuran === 'kecil') {
                    this.harga = this.hargaKecil;
                } else if (this.ukuran === 'besar') {
                    this.harga = this.hargaBesar;
                }
                this.showTotal = this.harga > 0;
            }
        }">
            @csrf
            
            {{-- Nama Customer --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Customer</label>
                <input type="text" name="nama_customer" class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
            </div>

            {{-- Kue yang dipilih (hidden atau readonly) --}}
            @if($selectedKue && $kueData)
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Kue Pilihan</label>
                    <input type="text" value="{{ $selectedKue }}" class="border rounded w-full py-2 px-3 text-gray-700 bg-gray-100" readonly>
                    <input type="hidden" name="kue_pilihan" value="{{ $selectedKue }}">
                </div>

                {{-- Pilihan Ukuran/Harga --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Pilih Paket</label>
                    <select name="ukuran" x-model="ukuran" @change="updateHarga()" class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        <option value="">-- Pilih Paket --</option>
                        <option value="kecil">Ori - Rp {{ number_format($kueData->harga_kecil, 0, ',', '.') }}</option>
                        <option value="besar">Premium - Rp {{ number_format($kueData->harga_besar, 0, ',', '.') }}</option>
                    </select>
                    <input type="hidden" name="harga" :value="harga">
                </div>
            @else
                {{-- Jika tidak ada kue yang dipilih, tampilkan dropdown --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Pilih Kue</label>
                    <select name="kue_pilihan" class="border rounded w-full py-2 px-3 text-gray-700" required onchange="window.location.href='{{ route('pesanan.create') }}?kue=' + this.value">
                        <option value="">-- Silahkan Pilih Kue --</option>
                        @foreach($daftarKue as $k)
                            <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            
            {{-- Jumlah --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Jumlah</label>
                <input type="number" name="jumlah" x-model="jumlah" min="1" class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
            </div>

            {{-- Total Harga --}}
            @if($selectedKue && $kueData)
                <div class="mb-4 bg-orange-50 p-4 rounded-lg border-2 border-orange-200" x-show="showTotal" x-transition>
                    <label class="block text-gray-700 font-bold mb-2">Total Pembayaran</label>
                    <p class="text-3xl font-bold text-[#522b05]" x-text="formatRupiah(total)">Rp 0</p>
                    <input type="hidden" name="total" :value="total">
                    <p class="text-sm text-gray-600 mt-2">
                        <span x-text="formatRupiah(harga)"></span> × <span x-text="jumlah"></span> box
                    </p>
                </div>
            @endif

            {{-- Alamat --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Alamat</label>
                <textarea name="alamat" class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" rows="3" required></textarea>
            </div>

            {{-- No HP --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">No HP</label>
                <input type="text" name="no_hp" class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
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

@push('scripts')
<script>
    @if(session('success'))
        Swal.fire({
            title: 'Pesanan Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonColor: '#522b05',
            confirmButtonText: 'OK'
        });
    @endif
    
    @if(session('error'))
        Swal.fire({
            title: 'Oops!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonColor: '#522b05',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endpush

