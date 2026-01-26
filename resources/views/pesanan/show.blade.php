
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Detail Pesanan</h1>
    <p><strong>Nama Customer:</strong> {{ $pesanan->nama_customer }}</p>
    <p><strong>Kue:</strong> {{ $pesanan->kue_pilihan }}</p>
    <p><strong>Jumlah:</strong> {{ $pesanan->jumlah }}</p>
    <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
    <p><strong>No HP:</strong> {{ $pesanan->no_hp }}</p>
    <a href="{{ route('pesanan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
</div>
@endsection