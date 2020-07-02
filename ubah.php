<?php include 'koneksi.php';

$id = $_GET["id"];
$ambil=$koneksi->query("SELECT * FROM data_training WHERE id='$id'");
$pecah=$ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Siswa</title>
	
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <!-- Import Font -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- Eksternal -->
    <link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light ">
		 	<div class="container">
				<a class="navbar-brand"><img src="img/logo2.png" width="40" > SMA Negeri 98 Jakarta</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="container">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Proses Perhitungan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Hasil Perhitungan</a>
							</li>
						</ul>
					</div>
				</div>
		  	</div>
		</nav><br>

	<div class="jumbotron">
		
	</div>


	<div class="container" >
		<div class="row">
			<div class="col-md-12" style="font-family: 'Viga', sans-serif;">
				
					<center>
							<h2>Perhitungan Data Training</h2>
					</center><br><br>


					<form method="POST">
					<h5><label for="">Pilih Data Training Ekstrakulikuler :</label>
					    <select class="custom-select col-md-3" name="pil_dtraining" id="pil_dtraining">
					    	 <option id="" value="" name=""><--Pilih--></option>
					        <option id="basket" value="basket" name="basket">Basket</option>
					        <option value="volly" name="volly">Volly</option>
					        <option value="hansball" name="hansball">Hansball</option>
					        <option value="pmr" name="pmr">PMR</option>
					    </select>		   
						<button type="submit" class="btn btn-primary" name="pilih">Pilih</button>
					</h5>
				</form>
				    <br><br>
				    <div>
				    	<h5 align="center"><?php 

							$tabel="data_training";
							$label="Data Training Basket";

				    		if (isset($_POST["pilih"])) {

									$tabel="";
									$label="";
									$pil=$_POST["pil_dtraining"];

									 if ($pil == 'basket') {
									 	$label="Data Training Basket";
									 	$tabel="data_training";

									 }elseif($pil == 'volly') {
									 	$label="Data Training Volly";
									 	$tabel="data_trainvol";

									 }elseif($pil == 'hansball') {
									 	$label="Data Training Hansball";
									 	$tabel="data_trainhand";

									 }elseif($pil == 'pmr') {
									 	$label="Data Training PMR";
									 	$tabel="data_trainpmr";
									 }	
								}


				    	echo "<br><br> $label" ?></h5>
				    </div> 

				<form method="POST">
					<div class="form-group">
						<label>Nilai Test Masuk :</label>
						<input type="text" name="nilai_tes_masuk" class="form-control" value="<?php echo $pecah['nilai_tes_masuk'];?>" required>
					</div>
					<div class="form-group">
						<label>Nilai Psikotes :</label>
						<input type="text" name="nilai_psikotes" class="form-control" value="<?php echo $pecah['nilai_psikotes'];?>" required>
					</div>
					<div class="form-group">
						<label>Hasil Test Kesehatan :</label>
						<input type="text" name="hasil_tes_kesehatan" class="form-control" value="<?php echo $pecah['hasil_tes_kesehatan'];?>" required>
					</div>
					
					<div class="form-group">
						<label>Hasil Test Fisik :</label>
						<input type="text" name="hasil_tes_fisik" class="form-control" value="<?php echo $pecah['hasil_tes_fisik'];?>" required>
					</div>
					<div class="form-group">
						<label>Hasil Test Wawancara :</label>
						<input type="text" name="hasil_tes_wawancara" class="form-control" value="<?php echo $pecah['hasil_tes_wawancara'];?>" required>
					</div>
					<div class="form-group">
						<label>keterangan:</label>
						<select name="keterangan" value="<?php echo $pecah['keterangan'];?>">
								<option value="Sesuai Minat">Sesuai Minat</option>
								<option value="Tidak Sesuai Minat">Tidak Sesuai MInat</option>
						</select>
					</div>

					<div>
						<button type="submit" class="btn btn-primary" name="submit">Ubah data</button>
						<input type="button" value="Kembali"  class="btn btn-secondary" onclick="history.back(-1)" />
					</div>
				</form>
			</div>
		</div>
	</div>

<?php


	if (isset($_POST["submit"]))
	{
		$koneksi->query("UPDATE $tabel SET 
			nilai_tes_masuk='$_POST[nilai_tes_masuk]', 
			nilai_psikotes='$_POST[nilai_psikotes]',
			hasil_tes_kesehatan='$_POST[hasil_tes_kesehatan]', 
			hasil_tes_fisik='$_POST[hasil_tes_fisik]', 
			hasil_tes_wawancara='$_POST[hasil_tes_wawancara]',
			keterangan='$_POST[keterangan]'
			WHERE id='$id'");

		echo "<script>alert('Data Diperbarui');</script>";
		echo "<script>location='home.php';</script>";
	}
?>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</body>
</html>