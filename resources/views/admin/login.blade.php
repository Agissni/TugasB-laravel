@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-orange-50 py-12">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Admin Login</h2>
        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">{{ session('error') }}</div>
        @endif
        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Password Admin</label>
                <input name="password" type="password" required class="mt-1 block w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" placeholder="Masukkan password admin">
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="bg-[#522b05] text-white px-6 py-3 rounded-full font-bold hover:bg-[#3d2004]">Masuk</button>
                <a href="/" class="text-sm text-gray-500 hover:underline">Kembali ke situs</a>
            </div>
        </form>

    </div>
</div>
@endsection