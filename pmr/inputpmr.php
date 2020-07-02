<?php include "../koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Mining

	</title>
	
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <!-- Import Font -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- Eksternal -->
    <link rel="stylesheet" type="text/css" href="../style1.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light ">
		 	<div class="container">
				<a class="navbar-brand"><img src="../img/logo2.png" width="40" > SMA Negeri 98 Jakarta</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="container">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          Pilih Data Training
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					       	<a class="dropdown-item" href="home.php">Data Training Basket</a>
					          <a class="dropdown-item" href="homevol.php">Data Training Volly</a>
					          <a class="dropdown-item" href="homehand.php">Data Training Handball</a>
					          <a class="dropdown-item" href="homepmr.php">Data Training PMR</a>
					        </div>
					      </li>
							<li class="nav-item">
								<a class="nav-link" href="../perhitungan.php">Proses Perhitungan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../proses.php">Hasil Perhitungan</a>
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
							<h2>Input Data Training PMR</h2>
					</center><br><br>

					
					<form method="POST">
					<div class="form-group">
						<label>Nilai Test Masuk :</label>
						<input type="text" name="nilai_tes_masuk" class="form-control" placeholder="Masukan Nilai Test Masuk" required>
					</div>
					<div class="form-group">
						<label>Nilai Psikotes :</label>
						<input type="text" name="nilai_psikotes" class="form-control" placeholder="Masukan Nilai Psikotes" required>
					</div>
					<div class="form-group">
						<label>Hasil Test Kesehatan :</label>
						<input type="text" name="hasil_tes_kesehatan" class="form-control" placeholder="Masukan Hasil Test Kesehatan" required>
					</div>					
					<div class="form-group">
						<label>Hasil Test Fisik :</label>
						<input type="text" name="hasil_tes_fisik" class="form-control" placeholder="Masukan Hasil Test Fisik" required>
					</div>
					<div class="form-group">
						<label>Hasil Test Wawancara :</label>
						<input type="text" name="hasil_tes_wawancara" class="form-control" placeholder="Masukan Hasil Test Wawancara" required>
					</div>
					<div class="form-group">
						<label>keterangan:</label>
						<select name="keterangan">
								<option value="Sesuai Minat">Sesuai Minat</option>
								<option value="Tidak Sesuai Minat">Tidak Sesuai Minat</option>
						</select>
					</div>
					<div>
						<button type="submit" class="btn btn-primary" name="add">Tambahkan Data</button>
						<button type="button" class="btn btn-secondary" onclick="history.back(-1)">Kembali</button>
					</div>
				</form>
			</div>
		</div>
	</div>
				<?php

					
				
					if (isset($_POST["add"]))
					{
								
						$koneksi->query("INSERT INTO data_trainpmr(nilai_tes_masuk, nilai_psikotes, hasil_tes_kesehatan, hasil_tes_fisik, hasil_tes_wawancara, keterangan) VALUES ('$_POST[nilai_tes_masuk]', '$_POST[nilai_psikotes]', '$_POST[hasil_tes_kesehatan]', '$_POST[hasil_tes_fisik]', '$_POST[hasil_tes_wawancara]','$_POST[keterangan]')");

						echo "<script>alert('Data Ditambahkan');</script>";
						echo "<script>location='../homepmr.php';</script>";
					}
				?>

	<div id="footer" >
		<div class="card">
  			<div class="card-body">
    			<p><b>&copy; 2020 created by Kelompok: Amjad, Fitrah, Rasyad dan Rafly</p>
  			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>




