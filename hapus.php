<?php 
include 'koneksi.php';


$ambil=$koneksi->query("SELECT * FROM data_training WHERE id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM data_training WHERE id='$_GET[id]'");

echo "<script>alert('Data Dihapus');</script>";
echo "<script>location='home.php';</script>";

?>