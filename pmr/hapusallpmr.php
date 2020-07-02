<?php 
include '../koneksi.php';
$ambil=$koneksi->query("SELECT * FROM data_trainpmr WHERE id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM data_trainpmr");

echo "<script>alert('Data Dihapus');</script>";
echo "<script>location='../homepmr.php';</script>";

?>