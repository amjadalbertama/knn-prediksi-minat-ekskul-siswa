<?php include "koneksi.php";
		
	
						


?>
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
    <link rel="stylesheet" type="text/css" href="style2.css">
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
					       	<a class="dropdown-item " href="home.php">Data Training Basket</a>
					          <a class="dropdown-item" href="homevol.php">Data Training Volly</a>
					          <a class="dropdown-item" href="homehand.php">Data Training Handball</a>
					          <a class="dropdown-item" href="homepmr.php">Data Training PMR</a>
					        </div>
					      </li>
							<li class="nav-item">
								<a class="nav-link" href="proses.php">Hasil Prediksi</a>
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
							<h5>Proses Perhitungan Data Training</h5>
					</center><br>

					<h5>Nilai K: 3</h5><br>

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

				    	echo "$label" ?></h5>
				    </div> 


				<div class="table1">
					<table class="table col-md-10" border="1" >
						  <thead class="thead-dark" align="center">
						    <tr>
						      <th scope="col">N0</th>
						      <th scope="col">X1</th>
						      <th scope="col">X2</th>
						      <th scope="col">X3</th>
						      <th scope="col">X4</th>
						      <th scope="col">X5</th>
						      <th scope="col">keterangan</th>
						    </tr>
						  </thead>
						  <tbody align="center">
								<?php $no=1; ?>
								<?php 	
								// Data Testing
									$dtest = $koneksi->query("SELECT (nilai_tes_masuk) as X1ts, 
												(nilai_psikotes) as X2ts,
												(hasil_tes_kesehatan) as X3ts,
												(hasil_tes_fisik) as X4ts,
												(hasil_tes_wawancara) as X5ts
												FROM data_testing"); 
									$ntest = $dtest->fetch_array();

								// Data Training
									$ambil=$koneksi->query("SELECT (nilai_tes_masuk) as X1tr, 
												(nilai_psikotes) as X2tr,
												(hasil_tes_kesehatan) as X3tr,
												(hasil_tes_fisik) as X4tr,
												(hasil_tes_wawancara) as X5tr,
												(keterangan) as ket
												FROM $tabel"); ?>
								<?php while ($ntrain=$ambil->fetch_array()) { ?> 
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $ntest['X1ts']."-".$ntrain['X1tr']; ?></td>
									<td><?php echo $ntest['X2ts']."-".$ntrain['X2tr']; ?></td>
									<td><?php echo $ntest['X3ts']."-".$ntrain['X3tr']; ?></td>
									<td><?php echo $ntest['X4ts']."-".$ntrain['X4tr']; ?></td>
									<td><?php echo $ntest['X5ts']."-".$ntrain['X5tr']; ?></td>
									<td><?php echo $ntrain["ket"]; ?></td>
								</tr>
								<?php $no++; ?>
								<?php } ?>
						  </tbody>
						</table><br>
					</div><br><br><br><br>


					<div class="table2">
						<h5 align="center">Tabel hasil pengurangan</h5>
					<table class="table col-md-10" border="1" >
						<thead class="thead-dark" align="center">
						   <tr>
						     <th scope="col">N0</th>
						     <th scope="col">X1</th>
						     <th scope="col">X2</th>
						     <th scope="col">X3</th>
						     <th scope="col">X4</th>
						     <th scope="col">X5</th>
						     <th scope="col">Keterangan</th>
						   </tr>
						</thead>
						<tbody align="center">
								<?php $no=1; ?>
								<?php // Data Testing
									$dtest = $koneksi->query("SELECT (nilai_tes_masuk) as X1ts, 
												(nilai_psikotes) as X2ts,
												(hasil_tes_kesehatan) as X3ts,
												(hasil_tes_fisik) as X4ts,
												(hasil_tes_wawancara) as X5ts
												FROM data_testing"); 
									$ntest = $dtest->fetch_array();

								// Data Training
									$ambil=$koneksi->query("SELECT (nilai_tes_masuk) as X1tr, 
												(nilai_psikotes) as X2tr,
												(hasil_tes_kesehatan) as X3tr,
												(hasil_tes_fisik) as X4tr,
												(hasil_tes_wawancara) as X5tr,
												(keterangan) as ket
												FROM $tabel"); ?>
								<?php while ($ntrain=$ambil->fetch_assoc()) { ?> 
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $ntest['X1ts']-$ntrain['X1tr']; ?></td>
									<td><?php echo $ntest['X2ts']-$ntrain['X2tr']; ?></td>
									<td><?php echo $ntest['X3ts']-$ntrain['X3tr']; ?></td>
									<td><?php echo $ntest['X4ts']-$ntrain['X4tr']; ?></td>
									<td><?php echo $ntest['X5ts']-$ntrain['X5tr']; ?></td>
									<td><?php echo $ntrain["ket"]; ?></td>
								</tr>
								<?php $no++; ?>
								<?php } ?>
						</tbody>
					</table><br>
				</div><br><br><br><br>

					<div class="table2">
						<h5 align="center">Tabel hasil Pengkuadratan</h5>
					<table class="table col-md-10" border="1" >
						<thead class="thead-dark" align="center">
						   <tr>
						     <th scope="col">N0</th>
						     <th scope="col">X1</th>
						     <th scope="col">X2</th>
						     <th scope="col">X3</th>
						     <th scope="col">X4</th>
						     <th scope="col">X5</th>
						     <th scope="col">/X1+X2+X3+X4+X5</th>
						     <th scope="col">Keterangan</th>
						   </tr>
						</thead>
						<tbody align="center">
								<?php $no=1; ?>
								<?php // Data Testing
									$dtest = $koneksi->query("SELECT (nilai_tes_masuk) as X1ts, 
												(nilai_psikotes) as X2ts,
												(hasil_tes_kesehatan) as X3ts,
												(hasil_tes_fisik) as X4ts,
												(hasil_tes_wawancara) as X5ts
												FROM data_testing "); 
									$ntest = $dtest->fetch_array();

								// Data Training
									$ambil=$koneksi->query("SELECT (nilai_tes_masuk) as X1tr, 
												(nilai_psikotes) as X2tr,
												(hasil_tes_kesehatan) as X3tr,
												(hasil_tes_fisik) as X4tr,
												(hasil_tes_wawancara) as X5tr,
												(keterangan) as ket
												FROM $tabel"); ?>
								<?php while ($ntrain=$ambil->fetch_assoc()) { ?> 
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo pow(($ntest['X1ts']-$ntrain['X1tr']), 2); ?></td>
									<td><?php echo pow(($ntest['X2ts']-$ntrain['X2tr']), 2); ?></td>
									<td><?php echo pow(($ntest['X3ts']-$ntrain['X3tr']), 2); ?></td>
									<td><?php echo pow(($ntest['X4ts']-$ntrain['X4tr']), 2); ?></td>
									<td><?php echo pow(($ntest['X5ts']-$ntrain['X5tr']), 2); ?></td>
									<td><?php echo sqrt(pow(($ntest['X1ts']-$ntrain['X1tr']), 2) + pow(($ntest['X2ts']-$ntrain['X2tr']), 2) + pow(($ntest['X3ts']-$ntrain['X3tr']), 2) + pow(($ntest['X4ts']-$ntrain['X4tr']), 2) + pow(($ntest['X5ts']-$ntrain['X5tr']), 2));?></td>
									<td><?php echo $ntrain["ket"]; ?></td>
								</tr>
								<?php $no++; ?>
								<?php } ?>
						</tbody>
					</table><br>
				</div>
				<a href="hapus_dttesting.php" class="btn btn-danger">Kembali ke Home</a>

			<a style="float: right;" href="proses.php" class="btn btn-dark">lanjut Kesimpulan</a>

			
						<!-- <a href="input.php" class="btn btn-dark">Tambah Data Training</a>
						<a href="hapusall.php" class="btn btn-danger" onclick="javascript: return confirm('yakin?');">Hapus Semua Data Training</a>
						<a href="" class="btn btn-success">Hitung</a>				
				 -->	
				 		<!-- <center>
							<h5>Perhitungan hasil Kuadrat</h5>
						</center><br> -->
				 		
			</div>
		</div>
	</div>

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