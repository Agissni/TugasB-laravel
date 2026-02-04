<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    // Dashboard dilindungi via route middleware (lihat routes/web.php)

    // Menampilkan daftar pesanan (Read)
    public function index()
{
    $pesanan = Pesanan::all();
    $daftarKue = DB::table('tokokue')->get();
    // Ubah dari 'Pesan' menjadi 'pesanan.index'
return view('pesanan.Pesan', compact('pesanan', 'daftarKue'));
}

    // Menampilkan dashboard terpisah (admin)
    public function dashboard()
    {
        $pesanan = Pesanan::all();
        $total = $pesanan->count();
        return view('dashboard', compact('pesanan', 'total'));
    }

    // Menampilkan form untuk membuat pesanan baru (Create)
    public function create(Request $request)
{
    $daftarKue = DB::table('tokokue')->get();
    $selectedKue = $request->query('kue'); // Ambil parameter kue dari URL
    
    // Cari data kue yang dipilih untuk mendapatkan harga
    $kueData = null;
    if ($selectedKue) {
        $kueData = DB::table('tokokue')->where('nama', $selectedKue)->first();
    }
    
    return view('pesanan.create', compact('daftarKue', 'selectedKue', 'kueData'));
}
    // Menyimpan pesanan baru (Create)
    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'kue_pilihan' => 'required|string|max:255',
            'ukuran' => 'required|string|in:kecil,besar',
            'harga' => 'required|integer|min:0',
            'jumlah' => 'required|integer|min:1',
            'total' => 'required|integer|min:0',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        Pesanan::create($request->all());

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat!');
    }

    // Menampilkan detail pesanan (Read)
    public function show(pesanan $pesan)  
    {
        return view('pesan.show', compact('pesan'));
    }

    // Menampilkan form untuk edit pesanan (Update)
    public function edit($id)
{
    $daftarKue = DB::table('tokokue')->get();
    $pesanan = Pesanan::findOrFail($id);
    // Pastikan variabel yang di-compact sama dengan yang di view
    return view('pesanan.edit', compact('pesanan', 'daftarKue'));
}

    // Menyimpan perubahan pesanan (Update)
    // Pastikan di dalam kurung ada $request dan $id
public function update(Request $request, $id) 
{
    $request->validate([
        'kue_pilihan' => 'required|string|max:255',
        'jumlah'      => 'required|integer|min:1',
        'alamat'      => 'required|string',
        'no_hp'       => 'required|string|max:20',
    ]);

    // Ambil data berdasarkan ID, lalu update
    $pesanan = Pesanan::findOrFail($id); 
    $pesanan->update($request->all());

    return redirect()->route('pesanan.index')->with('success', 'Data berhasil diubah!');
}
public function destroy($id)
{
    // Cari data berdasarkan ID
    $pesanan = Pesanan::findOrFail($id);
    
    // Hapus data
    $pesanan->delete();

    // Kembalikan ke halaman daftar dengan pesan sukses
    return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
}
}