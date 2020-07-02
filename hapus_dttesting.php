<?php 
include 'koneksi.php';
$ambil=$koneksi->query("SELECT * FROM data_testing WHERE id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM data_testing");

echo "<script>alert('Data Telah direset');</script>";
echo "<script>location='home.php';</script>";

?>