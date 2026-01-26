<?php
$server = 'localhost'; // Perbaikan: bukan 'localhots'
$username = 'root';
$password = '';
$database_name = 'toko_kue2'; // Nama variabel diubah agar tidak bentrok

// Perbaikan: variabel ke-4 harus sesuai dengan nama database
$conn = mysqli_connect($server, $username, $password, $database_name);

if (!$conn) {
    die("Database tidak connect: " . mysqli_connect_error());
} 
?>