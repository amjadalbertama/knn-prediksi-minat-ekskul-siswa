<?php 
include '../koneksi.php';
$ambil=$koneksi->query("SELECT * FROM data_trainhand WHERE id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM data_trainhand");

echo "<script>alert('Data Dihapus');</script>";
echo "<script>location='../homehand.php';</script>";

?>