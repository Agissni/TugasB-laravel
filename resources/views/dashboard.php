<?php
session_start();
include 'config.php';

// Satpam: Cek apakah yang login adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<h1>Dashboard Admin - La Dolce Raya</h1>
<p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>

<hr>
<a href="tambah_kue.php">Tambah Menu Kue Baru</a>

<h3>Daftar Pesanan Masuk dari Customer</h3>
<table border="1" cellpadding="10" cellspacing="0">
    <tr bgcolor="#eee">
        <th>No</th>
        <th>Nama Customer</th>
        <th>Kue yang Dipesan</th>
        <th>Jumlah</th>
        <th>Alamat</th>
        <th>No. HP</th>
    </tr>
    <?php
    $no = 1;
    // Mengambil data dari tabel pesanan yang id_pesanannya sudah auto_increment
    $ambil_pesanan = mysqli_query($conn, "SELECT * FROM pesanan");
    while($p = mysqli_fetch_array($ambil_pesanan)){
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$p['nama_customer']."</td>";
        echo "<td>".$p['kue_pilihan']."</td>";
        echo "<td>".$p['jumlah']."</td>";
        echo "<td>".$p['alamat']."</td>";
        echo "<td>".$p['no_hp']."</td>";
        echo "</tr>";
    }
    ?>
</table>