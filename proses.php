<?php 
include ("koneksi.php");

$testrain = $koneksi->query("SELECT * FROM data_testing");

	

$koneksi->query("CREATE TEMPORARY TABLE RangkingSementara(
        Rangking int AUTO_INCREMENT primary key,
       	nilai_tes_masuk int,
        nilai_psikotes int,
       	hasil_tes_kesehatan int,
        hasil_tes_fisik int,
        hasil_tes_wawancara int,
        nilai int,
        keterangan varchar(100));
    ");

$koneksi->query("CREATE TEMPORARY TABLE Kesimpulan(
        Nomor int AUTO_INCREMENT primary key,
       	nilai_tes_masuk int,
        nilai_psikotes int,
       	hasil_tes_kesehatan int,
        hasil_tes_fisik int,
        hasil_tes_wawancara int,
        nilai int,
        keterangan varchar(100));
    ");

?>
<!DOCTYPE html>	
<html>
<head>
	<title>Hasil Perhitungan</title>
<title>Nilai Hasil Perhitungan Calon Peserta Lomba Paskib</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <!-- Import Font -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- Eksternal -->
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
								<a class="nav-link" href="perhitungan.php">Proses Perhitungan</a>
							</li>
						</ul>
					</div>
				</div>
		  	</div>
		</nav>

	<div class="jumbotron">
		<center>
			<img src="image/logo2.png" img-circle>
        	<h1>SMA NEGERI 98 Jakarta Timur</h1>	
			<h1 class="display-4">Nilai Hasil Perhitungan</h1>
		</center>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12" style="font-family: 'Viga', sans-serif;">
					<center>
							<h2>Tabel Hasil Perengkingan</h2>
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
					<?php 
						// nilai K
						$nilaik = 3;
						//nilai data testing
						$dtest = $koneksi->query("SELECT (nilai_tes_masuk) as X1ts, 
												(nilai_psikotes) as X2ts,
												(hasil_tes_kesehatan) as X3ts,
												(hasil_tes_fisik) as X4ts,
												(hasil_tes_wawancara) as X5ts
												FROM data_testing "); 
						$ntest = $dtest->fetch_array();

						//nilai data training
						$dtrain = $koneksi->query("SELECT (nilai_tes_masuk) as X1tr, 
												(nilai_psikotes) as X2tr,
												(hasil_tes_kesehatan) as X3tr,
												(hasil_tes_fisik) as X4tr,
												(hasil_tes_wawancara) as X5tr,
												(keterangan) as ket
												FROM $tabel ");
							echo "
							 
								<table class='table' border='1'>
									<thead class='thead-dark'>
										<tr>
										    <th scope='col'>N0</th>
										    <th scope='col'>Tes Masuk</th>
										    <th scope='col'>Tes Psikotes</th>
										    <th scope='col'>Tes Kesehatan</th>
										    <th scope='col'>Tes Fisik</th>
										    <th scope='col'>Tes Wawancara</th>
										    <th scope='col'>Nilai</th>
										    <th scope='col'>keterangan</th>
										</tr>
									</thead>
							";
						$no=1;

							//proses perhitungan data train dengan data tes

						while ($ntrain = $dtrain->fetch_array()) {

						$nilai = sqrt(pow(($ntest['X1ts']-$ntrain['X1tr']), 2) + pow(($ntest['X2ts']-$ntrain['X2tr']), 2) + pow(($ntest['X3ts']-$ntrain['X3tr']), 2) + pow(($ntest['X4ts']-$ntrain['X4tr']), 2) + pow(($ntest['X5ts']-$ntrain['X5tr']), 2));


						$data[] = array('nilai_tes_masuk'=>$ntrain['X1tr'],'nilai_psikotes'=>$ntrain['X2tr'],'hasil_tes_kesehatan'=>$ntrain['X3tr'],'hasil_tes_fisik'=>$ntrain['X4tr'],'hasil_tes_wawancara'=>$ntrain['X5tr'],'poin'=>$nilai,'keterangan'=>$ntrain['ket']);

							

							//simpan rangking
							$koneksi->query("INSERT INTO RangkingSementara (nilai_tes_masuk,nilai_psikotes,hasil_tes_kesehatan,hasil_tes_fisik,hasil_tes_wawancara,nilai,keterangan)
     						 VALUES ('".$ntrain['X1tr']."',
     						 '".$ntrain['X2tr']."',
     						 '".$ntrain['X3tr']."',
     						 '".$ntrain['X4tr']."',
     						 '".$ntrain['X5tr']."',
     						 '".$nilai."',
     						 '".$ntrain['ket']."'
     						); ");

						}


							// Urutkan jarak dari yang terkecil
						      $rangking = $koneksi ->query("SELECT * FROM RangkingSementara ORDER BY nilai ASC LIMIT $nilaik");      
						      while ($datas = $rangking->fetch_array()) {

						      // Simpan kesimpulan
						    $koneksi->query("INSERT INTO Kesimpulan (nilai_tes_masuk,nilai_psikotes,hasil_tes_kesehatan,hasil_tes_fisik,hasil_tes_wawancara,nilai,keterangan)
						      VALUES ('".$datas['nilai_tes_masuk']."',
						      		'".$datas['nilai_psikotes']."',
						      		'".$datas['hasil_tes_kesehatan']."',
						      		'".$datas['hasil_tes_fisik']."',
						      		'".$datas['hasil_tes_wawancara']."',
						      		'".$datas['nilai']."',
						      		'".$datas['keterangan']."'
						      		); ");
						      // var_dump($datas['keterangan']);


							
						    }

						foreach ($data as $key => $isi) {

							$keterangan[$key]=$isi['keterangan'];
							$poin[$key]=$isi['poin'];
							$nilaitesmasuk[$key]=$isi['nilai_tes_masuk'];
							$nilaipsikotes[$key]=$isi['nilai_psikotes'];
							$hasilkesehatan[$key]=$isi['hasil_tes_kesehatan'];
							$hasilfisik[$key]=$isi['hasil_tes_fisik'];
							$hasilwawancara[$key]=$isi['hasil_tes_wawancara'];
						}

						array_multisort($poin,SORT_ASC,$data);
						
						// $status = "Prioritas";
						// $tingkat = 1;

						foreach ($data as $item) { ?>
	
							<tr>
   								<td><?php echo $no ?></td>
   								<td><?php echo $item['nilai_tes_masuk'] ?></td>
   								<td><?php echo $item['nilai_psikotes'] ?></td>
   								<td><?php echo $item['hasil_tes_kesehatan'] ?></td>
   								<td><?php echo $item['hasil_tes_fisik'] ?></td>
  								<td><?php echo $item['hasil_tes_wawancara'] ?></td>
  								<td><?php echo $item['poin'] ?></td>
   								<td><?php echo $item['keterangan'] ?></td>
   							</tr>
						
   						<?php

   							$no++;
   							// $tingkat++;
   							
  						 }

						echo "</table><br>";
						?>

						 <div class="table-responsive">
						  	<center><h3>Kesimpulan Hasil Prediksi</h3></center>
					      
						    <table class="table" border="1">
						      <thead class='thead-dark'>
						        <tr>
						          <th scope="col">Nilai tes Masuk</th>
						          <th scope="col">Nilai Prediksi</th>
						          <th scope="col">Hasil tes Kesehatan</th>
						          <th scope="col">Hasil tes Fisik</th>
						          <th scope="col">hasil tes Wawancara</th>
						          <th scope="col">Kesimpulan</th>
						        </tr>
						      </thead>

						      <tbody>
						        <?php
						        	
							        $kesimpulan = $koneksi->query("SELECT keterangan, count(keterangan) as jumlah FROM Kesimpulan GROUP BY keterangan ORDER BY jumlah ASC
									 ");

							        while ($data = $kesimpulan->fetch_array()){

										$ket = "";
										if($data['keterangan'] == 'Sesuai Minat')
												 {$ket = "Sesuai Minat";
	
										}else if($data['keterangan'] == 'Tidak Sesuai Minat')
												{$ket = "Tidak Sesuai Minat";

										}  

										// var_dump($data['keterangan']);

									}
						         
						        ?>                
						          <tr>
						            <td align="center"><?=$ntest["X1ts"]?></td>
						            <td align="center"><?=$ntest["X2ts"]?></td>
						            <td align="center"><?=$ntest["X3ts"]?></td>
						            <td align="center"><?=$ntest["X4ts"]?></td>
						            <td align="center"><?=$ntest["X5ts"]?></td>
						            <td>
	              						<?=$ket?>
	              					</td>
						          </tr>                
						      </tbody>
						    </table>
						  </div>
 					<a href="hapus_dttesting.php" class="btn btn-danger">Kembali ke Home</a>
 					<a href="perhitungan.php" class="btn btn-success">Lihat Proses Perhitungan</a>
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

