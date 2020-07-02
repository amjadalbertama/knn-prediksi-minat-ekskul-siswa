<?php include "koneksi.php";
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Mining</title>
	
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <!-- Import Font -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- Eksternal -->
    <link rel="stylesheet" type="text/css" href="style3.css">
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
							<li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          Pilih Data Training
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					       	<a class="dropdown-item active" href="home.php">Data Training Basket</a>
					          <a class="dropdown-item" href="homevol.php">Data Training Volly</a>
					          <a class="dropdown-item" href="homehand.php">Data Training Handball</a>
					          <a class="dropdown-item" href="homepmr.php">Data Training PMR</a>
					        </div>
					      </li>
							<li class="nav-item" >
								<a class="nav-link" href="perhitungan.php">Proses Perhitungan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="proses.php">Hasil Prediksi</a>
							</li>
						</ul>
					</div>
				</div>
		  	</div>
		</nav>

	<div class="jumbotron">
		<center>
			<img src="img/logo2.png" img-circle width="200" >
        	<h1 class="p">Data Mining</h1>	
			<h2>Perhitungan KNN Untuk menentukan pola minat Ekstrakulikuler Siswa</h2>
		</center>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12" style="font-family: 'Viga', sans-serif;">
				<center>
						<h2 style="font-family: 'Viga', sans-serif;">Data Training Basket</h2>
				</center><br><br>
				
				<table class="table" border="1">
					<thead class="thead-dark">
						<tr>
						    <th scope="col">N0</th>
						    <th scope="col">Tes Masuk</th>
						    <th scope="col">Tes Psikotes</th>
						    <th scope="col">Tes Kesehatan</th>
						    <th scope="col">Tes Fisik</th>
						    <th scope="col">Tes Wawancara</th>
						    <th scope="col">Keterangan</th>
						    <th scope="col">action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						<?php 
								
								$ambil=$koneksi->query("SELECT * FROM data_training"); 
						?>
						<?php while ($pecah=$ambil->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $pecah["nilai_tes_masuk"]; ?></td>
							<td><?php echo $pecah["nilai_psikotes"]; ?></td>
							<td><?php echo $pecah["hasil_tes_kesehatan"]; ?></td>
							<td><?php echo $pecah["hasil_tes_fisik"]; ?></td>
							<td><?php echo $pecah["hasil_tes_wawancara"]; ?></td>
							<td><?php echo $pecah["keterangan"]; ?></td>
							<td>	
								<a href="ubah.php?id=<?php echo $pecah["id"] ?>"class="btn btn-warning" role="button">ubah</a>
								<a href="hapus.php?id=<?php echo $pecah["id"] ?>" onclick="javascript: return confirm('yakin?');" class="btn btn-danger" role="button">hapus</a>
							</td>		
						</tr>
						<?php $no++; ?>
						<?php } ?>
					</tbody>
				</table><br>
					<a href="input.php" class="btn btn-primary">Tambah Data Training</a>
					<a href="hapusall.php" class="btn btn-danger" onclick="javascript: return confirm('yakin?');">Hapus Semua Data Training</a>
					<a href="perhitungan.php" class="btn btn-success">Proses</a><br><br><hr><br>

				<div class="data-test">
				<form method="POST">
					<h3>Masukan Data Testing</h3>
					<div class="form-group">
						<label>Nilai Test Masuk:</label>
						<input type="text" name="nilai_tes_masuk" class="form-control" placeholder="Masukan Test Masuk" required>
						<div class="invalid-feedback">
							Please provide a valid city.
						</div>
					</div>
					<div class="form-group">
						<label>Nilai Psikotes:</label>
						<input type="text" name="nilai_psikotes" class="form-control" placeholder="Masukan nilai_psikotes" required>
					</div>
					<div class="form-group">
						<label>Hasil Test Kesehatan:</label>
						<input type="text" name="hasil_tes_kesehatan" class="form-control" placeholder="Masukan Hasil Test Kesehatan" required >
					</div>
					<div class="form-group">
						<label>Hasil Test Fisik:</label>
						<input type="text" name="hasil_tes_fisik" class="form-control" placeholder="Masukan hasil Test Fisik" required>
					</div>
					<div class="form-group">
						<label>Hasil Test Wawancara:</label>
						<input type="text" name="hasil_tes_wawancara" class="form-control " placeholder="Masukan Hasil Test Wawancara" required>
					</div>
					<div>
						<button type="submit" class="btn btn-primary" name="add">Tambahkan Data</button>
					</div>
				</form>
				</div>				
			</div>
		</div>
	</div>

				<?php
					

					if (isset($_POST["add"]))
					{
							
							$koneksi->query("INSERT INTO data_testing (nilai_tes_masuk, nilai_psikotes, hasil_tes_kesehatan, hasil_tes_fisik, hasil_tes_wawancara) VALUES ('$_POST[nilai_tes_masuk]', '$_POST[nilai_psikotes]', '$_POST[hasil_tes_kesehatan]', '$_POST[hasil_tes_fisik]', '$_POST[hasil_tes_wawancara]')");

						echo "<script>alert('Data Testing Sudah Ditambahkan');</script>";
						echo "<script>location='proses.php';</script>";

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