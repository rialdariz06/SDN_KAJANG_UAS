<?php
$host = 'localhost'; // atau IP server jika bukan localhost
$user = 'root'; // username MySQL
$pass = ''; // password MySQL
$dbname = 'sdn_kajang';

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
