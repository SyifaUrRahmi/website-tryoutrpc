<?php
      require_once "dbconfig.php";
			// Cek status login user 
			if (!$user->isLoggedIn()) {
			header("location: login.php"); //Redirect ke halaman login 
  		}
  		$currentUser = $user->getUser();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>CAT | HASIL</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
			crossorigin="anonymous"
		/>
    <link rel="stylesheet" href="assets/styles/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	</head>
	<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
			<div class="container-fluid">
				<b class="navbar-brand p-2 text-secondary" href="#">
						<img
							src="assets/img/tes.jpeg"
							alt="Logo"
							width="40"
							height="35"
							class="d-inline-block rounded"
						/>
						RanuPrima<b class="teks text-warning">College</b></b
					>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="mulai_snbt.php">SNBT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="mulai_cat.php">CAT</a>
						</li>
					</ul>
					<ul class="navbar-nav ms-auto">
						<li class="nav-item dropdown">
							<a
								class="nav-link dropdown-toggle"
								href="#"
								role="button"
								data-bs-toggle="dropdown"
								aria-expanded="false"
								><i class="bi bi-person-circle"></i> <?php echo $currentUser['nama']?>
							</a>
							<ul class="dropdown-menu">
								<li>
									<hr class="dropdown-divider" />
								</li>
								<li>
									<form action="logout.php" method="POST">
										<button type="submit" class="dropdown-item">
											<i class="bi bi-box-arrow-right"></i> Logout
										</button>
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	<!--NILAI TKP-->
	<?php
            include "koneksi.php";
            	 
						    $score5 = 0;
						    $score4 = 0;
						    $score3 = 0;
						    $score2 = 0;
						    $score1 = 0;
						    $benar5 = 0;
						    $benar4 = 0;
						    $benar3 = 0;
						    $benar2 = 0;
						    $benar1 = 0;
						    $salahtkp    = 0;
						    $hasiltkp    = 0;
						    
                // Nilai TIU
                $scoretiu   = 0;
						    $benartiu   = 0;
						    $salah    = 0;
						    $hasil    = 0;

                // Nilai TWK
                $scoretwk   = 0;
						    $benartwk   = 0;
						    $salahtwk    = 0;
						    $hasiltwk    = 0;
						  
						  
                  if(isset($_POST['next'])){
                    // Nilai TKP
                    if(empty($_POST['pilihantkp'])){
                      $_POST["pilihantkp"] = "";
                  
                  }
                  $pilihantkp    =$_POST["pilihantkp"];
                  $id_soaltkp    =$_POST["idtkp"];
                  $jumlahtkp     =$_POST["jumlahtkp"];

                  for($i=0;$i<$jumlahtkp;$i++){
                      $nomortkp    =$id_soaltkp[$i];
                      
                      // jika peserta tidak memilih jawaban
                      if(empty($pilihantkp[$nomortkp])){
                          $salahtkp++;
                      }
                      // jika memilih
                      else {
                          $jawabantkp  = $pilihantkp[$nomortkp];
                          // cocokan kunci jawaban dengan database
                          $query5  = mysqli_query($koneksi, "SELECT * FROM tkp WHERE id='$nomortkp' AND skor5='$jawabantkp'");
                          $cek5    =mysqli_num_rows($query5);
                          
                          if($cek5){
                            $benar5++;
                          }
                          else {
                              $salahtkp++;
                          }

													$query4  = mysqli_query($koneksi, "SELECT * FROM tkp WHERE id='$nomortkp' AND skor4='$jawabantkp'");
                          $cek4    =mysqli_num_rows($query4);
                          
                          if($cek4){
                            $benar4++;
                          }
                          else {
                              $salahtkp++;
                          }

													$query3  = mysqli_query($koneksi, "SELECT * FROM tkp WHERE id='$nomortkp' AND skor3='$jawabantkp'");
                          $cek3    =mysqli_num_rows($query3);
                          
                          if($cek3){
                            $benar3++;
                          }
                          else {
                              $salahtkp++;
                          }

													$query2  = mysqli_query($koneksi, "SELECT * FROM tkp WHERE id='$nomortkp' AND skor2='$jawabantkp'");
                          $cek2    =mysqli_num_rows($query2);
                          
                          if($cek2){
                            $benar2++;
                          }
                          else {
                              $salahtkp++;
                          }

													$query1  = mysqli_query($koneksi, "SELECT * FROM tkp WHERE id='$nomortkp' AND skor1='$jawabantkp'");
                          $cek1    =mysqli_num_rows($query1);
                          
                          if($cek1){
                            $benar1++;
                          }
                          else {
                              $salahtkp++;
                          }

                          
                      }
                      $score5 = $benar5 * 5;
											$score4 = $benar4 * 4;
											$score3 = $benar3 * 3;
											$score2 = $benar2 * 2;
											$score1 = $benar1 * 1; 

											$hasiltkp = $score5 + $score4 + $score3 + $score2 + $score1;

                      $id = $currentUser['id'];
                      $updatetkp = "update user set tkp = '$hasiltkp' where id = '$id'";
                      $sqltkp    = mysqli_query($koneksi, $updatetkp);
                      

                  }
              // Nilai TIU
                  if(empty($_POST['pilihan'])){
                      $_POST["pilihan"] = "";
                  ?>    
                  <?php
                  }
                  $pilihan    =$_POST["pilihan"];
                  $id_soal    =$_POST["id"];
                  $jumlah     =$_POST["jumlah"];

                  for($i=0;$i<$jumlah;$i++){
                      $nomor    =$id_soal[$i];
                      
                      // jika peserta tidak memilih jawaban
                      if(empty($pilihan[$nomor])){
                          $salah++;
                      }
                      // jika memilih
                      else {
                          $jawaban  = $pilihan[$nomor];
                          // cocokan kunci jawaban dengan database
                          $querytiu  = mysqli_query($koneksi, "SELECT * FROM tiu WHERE id='$nomor' AND jawaban='$jawaban' ");
                          $cektiu    =mysqli_num_rows($querytiu);
                          // bobot 20
                          if($cektiu){
                            $benartiu++;
                          }
                          else {
                              $salah++;
                          }

                          
                      }
                      $scoretiu = $benartiu * 5; 

                      $id = $currentUser['id'];
                      $update = "update user set tiu = '$scoretiu' where id = '$id'";
                      $sql    = mysqli_query($koneksi, $update);

                  }

                // Nilai TWK
                if(empty($_POST['pilihantwk'])){
                      $_POST["pilihantwk"] = "";
                  
                  }
                  $pilihantwk    =$_POST["pilihantwk"];
                  $id_soaltwk    =$_POST["idtwk"];
                  $jumlahtwk     =$_POST["jumlahtwk"];

                  for($i=0;$i<$jumlahtwk;$i++){
                      $nomortwk    =$id_soaltwk[$i];
                      
                      // jika peserta tidak memilih jawaban
                      if(empty($pilihantwk[$nomortwk])){
                          $salahtwk++;
                      }
                      // jika memilih
                      else {
                          $jawabantwk  = $pilihantwk[$nomortwk];
                          // cocokan kunci jawaban dengan database
                          $querytwk  = mysqli_query($koneksi, "SELECT * FROM twk WHERE id='$nomortwk' AND jawaban='$jawabantwk' ");
                          $cektwk    =mysqli_num_rows($querytwk);
                          // bobot 20
                          if($cektwk){
                            $benartwk++;
                          }
                          else {
                              $salahtwk++;
                          }

                          
                      }
                      $scoretwk = $benartwk * 5; 

                      $id = $currentUser['id'];
                      $updatetwk = "update user set twk = '$scoretwk' where id = '$id'";
                      $sqltwk    = mysqli_query($koneksi, $updatetwk);

                  }
              }
              $id = $currentUser['id'];
						
					    $query = mysqli_query($koneksi, "SELECT * FROM user where id='$id'");
					    $data = mysqli_fetch_array($query);	
      ?>
      <br>
      <center>
      <div class="d-flex justify-content-center m-3">
			    <img src="assets/img/logorpc.jpeg" class="rounded float-start m-2" width="90" height="90">
			    <img src="assets/img/logounhas.jpeg" class="rounded float-start m-1"
		  width="180" height="90">
			    <img src="assets/img/logoaas.jpeg" class="rounded float-start m-2" width="90" height="90">
	  </div>
	  </center>
    	<div align="center">
      <div
			class=" bg-warning rounded p-3 m-3"
		  >
      <p><b>Hasil Tryout SKD CAT</b></p>
			<p><b>Nama : <?php echo $data['nama'] ?></b></p>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Komponen</th>
						<th scope="col">Score</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Tes Wawasan Kebangsaan (TWK)</td>
						<td><?php echo $data['twk'] ?>/150</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>Tes Intelegensia Umum (TIU)</td>
						<td><?php echo $data['tiu'] ?>/175</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>Tes Karakteristik Pribadi (TKP)</td>
						<td><?php echo $data['tkp'] ?>/225</td>
					</tr>
					
				</tbody>
			</table>
      </div>
      <br><br>
      <a href="index.php" class="btn btn-dark text-light mb-3">Home</a>
      <br><br>
		</div>
		<footer>
			<!-- Start Alert -->
			<section>
				<div class="text-center p-3 bg-dark text-white">
					© 2023 Copyright RanuPrimaCollege | Made With Syifa Ur Rahmi
				</div>
			</section>
		</footer>
	</body>
</html>
