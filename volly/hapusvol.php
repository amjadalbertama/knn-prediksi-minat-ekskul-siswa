<?php 
include '../koneksi.php';


$ambil=$koneksi->query("SELECT * FROM data_trainvol WHERE id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM data_trainvol WHERE id='$_GET[id]'");

echo "<script>alert('Data Dihapus');</script>";
echo "<script>location='../homevol.php';</script>";

?>