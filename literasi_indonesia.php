<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>SNBT | LITERASI DALAM BAHASA INDONESIA</title>
        <link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="assets/styles/style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
		<!-- Kita membutuhkan jquery, disini saya menggunakan langsung dari jquery.com, jquery ini bisa didownload dan ditaruh dilocal -->
		<script
			src="https://code.jquery.com/jquery-1.10.2.min.js"
			type="text/javascript"
		></script>

		<!-- Script Timer -->
		<script type="text/javascript">
			$(document).ready(function () {
				/** Membuat Waktu Mulai Hitung Mundur Dengan
				 * var detik = 0,
				 * var menit = 1,
				 * var jam = 1
				 */
				var detik = 0;
				// var menit = 45;
				var menit = 30;
				var jam = 0;

				/**
				 * Membuat function hitung() sebagai Penghitungan Waktu
				 */
				function hitung() {
					/** setTimout(hitung, 1000) digunakan untuk
					 * mengulang atau merefresh halaman selama 1000 (1 detik)
					 */
					setTimeout(hitung, 1000);

					/** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
					// if (menit < 1 && jam == 0) {
					// 	var peringatan = style="color:red";
					// }

					/** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
					$("#timer").html(
						// '<h6 align="right"' +
						// 	peringatan +
						// 	">Sisa waktu anda : &nbsp;&nbsp;&nbsp;" +
						// 	jam +
						// 	" jam : " +
						// 	menit +
						// 	" menit : " +
						// 	detik +
						// 	" detik</h6>"
							"Sisa waktu anda : &nbsp;&nbsp;&nbsp;" +
							jam +
							" jam : " +
							menit +
							" menit : " +
							detik +
							" detik"
					);

					/** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
					detik--;

					/** Jika var detik < 0
					 * var detik akan dikembalikan ke 59
					 * Menit akan Berkurang 1
					 */
					if (detik < 0) {
						detik = 59;
						menit--;

						/** Jika menit < 0
						 * Maka menit akan dikembali ke 59
						 * Jam akan Berkurang 1
						 */
						if (menit < 0) {
							menit = 59;
							jam--;

							/** Jika var jam < 0
							 * clearInterval() Memberhentikan Interval dan submit secara otomatis
							 */
							if (jam < 0) {
								clearInterval();
								/** Variable yang digunakan untuk submit secara otomatis di Form */
								// var frmSoal = document.getElementById("frmSoal");
								var submitBtn = document.getElementById("submitBtn");
								submitBtn.click();

								// frmSoal.submit();
							}
						}
					}
				}
				/** Menjalankan Function Hitung Waktu Mundur */
				hitung();
			});
			// ]]>
		</script>
	</head>
	<body>
        <?php
      require_once "dbconfig.php";
			// Cek status login user 
			if (!$user->isLoggedIn()) {
			header("location: login.php"); //Redirect ke halaman login 
  		}
  		$currentUser = $user->getUser();

        ?>
				<p id="timer" align="right" class="text-light p-3 bg-dark fixed-top"></p>	
				<br>
        <br>
				<p align="center" class="mt-3"><b>LITERASI DALAM BAHASA INDONESIA</b></p>

        <form action="literasi_inggris.php" method="POST" id="frmSoal">
        <?php
            include "koneksi.php";
						// ORDER BY RAND()
            $query    = mysqli_query($koneksi, "SELECT * FROM literasi_indonesia WHERE id > 40 ORDER BY RAND()");
            $jumlah = mysqli_num_rows($query);
            $no = 0;
            while($data = mysqli_fetch_array($query)){
            $no++
            ?>
		<!-- col-md-6 col-lg-4 -->
							<table border="0" class="m-3 p-2 bg-warning d-flex rounded">
        <tbody>   
                <input type="hidden" name="id[]" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
								<?php
                    if(!empty($data['text'])){
                        echo "<tr><td>$data[text]</td><td></td></tr>";
                    }
                ?>
                <tr>
                    <td align="justify"><?php echo $no?>. <?php echo $data['soal'];?></td>
                    <td> </td>
                </tr>
                
                <tr>
                    <td><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="A" style="height:25px; width:25px; vertical-align: middle"> A. <?php echo $data['pilihan_a'];?></td>
                    <td> </td>
                </tr>
                <tr>
                    <td><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="B" style="height:25px; width:25px; vertical-align: middle"> B. <?php echo $data['pilihan_b'];?></td>
                    <td> </td>
                </tr>
                <tr>
                    <td><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="C" style="height:25px; width:25px; vertical-align: middle"> C. <?php echo $data['pilihan_c'];?></td>
                    <td> </td>
                </tr>
                <tr>
                    <td><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="D" style="height:25px; width:25px; vertical-align: middle"> D. <?php echo $data['pilihan_d'];?></td>
                    <td> </td>
                </tr>
                <tr>
                    <td><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="E" style="height:25px; width:25px; vertical-align: middle"> E. <?php echo $data['pilihan_e'];?></td>
                    <td> </td>
                </tr>
								</tbody>
    </table>
		
                <div class="form-group">
				<input type="hidden" name="post_id" id="post_id" />
				<div id="autoSave"></div>
			    </div>
                <?php
                }
                  ?>
								<div align="center">
									<button class="btn btn-dark p-2 m-3" name="next" id='submitBtn' type="submit">Selanjutnya</button></td>  
								</div>
            </form>

						<?php 
						            include "koneksi.php";
            	          $score1   = 0;
						  $score2   = 0;
						  $score3   = 0;
						  $score4   = 0;
						  $score5   = 0;
						  $score6   = 0;
						  $score7   = 0;
						  $score8   = 0;
						  $score9   = 0;
						  
						  $benar1   = 0;
						  $benar2   = 0;
						  $benar3   = 0;
						  $benar4   = 0;
						  $benar5   = 0;
						  $benar6   = 0;
						  $benar7   = 0;
						  $benar8   = 0;
						  $benar9   = 0;
						  
						  $salah    = 0;
						  
						  $hasil    = 0;
						  $error = "";
						  $sukses = "";
                  if(isset($_POST['next'])){
                    if(empty($_POST['pilihan'])){
                      $_POST["pilihan"] = "";
                  ?>
                  
                      <!-- <script language="JavaScript">
                          alert('Oops! Serius. Anda tidak mengerjakan soal apapun ...');
                          document.location='./';
                      </script> -->
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
                          $query1  = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif WHERE id='$nomor' AND jawaban='$jawaban' and bobot=20");
                          $cek1    =mysqli_num_rows($query1);
                          // bobot 10
                          if($cek1){
                            $benar1++;
                          }
                          else {
                              $salah++;
                          }

                          $query2  = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif WHERE id='$nomor' AND jawaban='$jawaban' and bobot=30");
                          $cek2    =mysqli_num_rows($query2);
                          
                          // bobot 20
                          if($cek2){
                            $benar2++;
                          }
                          else {
                              $salah++;
                          }

                          $query3  = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif WHERE id='$nomor' AND jawaban='$jawaban' and bobot=35");
                          $cek3    =mysqli_num_rows($query3);
                          
                          // bobot 25
                          if($cek3){
                            $benar3++;
                          }
                          else {
                              $salah++;
                          }

                          $query4  = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif WHERE id='$nomor' AND jawaban='$jawaban' and bobot=40");
                          $cek4    =mysqli_num_rows($query4);
                          
                          // bobot 30
                          if($cek4){
                            $benar4++;
                          }
                          else {
                              $salah++;
                          }

                          $query5  = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif WHERE id='$nomor' AND jawaban='$jawaban' and bobot=50");
                          $cek5    =mysqli_num_rows($query5);
                          
                          // bobot 40
                          if($cek5){
                            $benar5++;
                          }
                          else {
                              $salah++;
                          }

                          $query6  = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif WHERE id='$nomor' AND jawaban='$jawaban' and bobot=60");
                          $cek6    =mysqli_num_rows($query6);
                          
                          // bobot 50
                          if($cek6){
                            $benar6++;
                          }
                          else {
                              $salah++;
                          }

                          $query7  = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif WHERE id='$nomor' AND jawaban='$jawaban' and bobot=70");
                          $cek7    =mysqli_num_rows($query7);
                          
                          // bobot 5
                          if($cek7){
                            $benar7++;
                          }
                          else {
                              $salah++;
                          }

                          $query8  = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif WHERE id='$nomor' AND jawaban='$jawaban' and bobot=75");
                          $cek8    =mysqli_num_rows($query8);
                          // bobot 8
                          if($cek8){
                            $benar8++;
                          }
                          else {
                              $salah++;
                          }
                          
                          $query9  = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif WHERE id='$nomor' AND jawaban='$jawaban' and bobot=80");
                          $cek9    =mysqli_num_rows($query9);
                          // bobot 35
                          if($cek9){
                            $benar9++;
                          }
                          else {
                              $salah++;
                          }

                      }
                      $score1 = $benar1 * 20; 
                      $score2 = $benar2 * 30; 
                      $score3 = $benar3 * 35;
                      $score4 = $benar4 * 40;
                      $score5 = $benar5 * 50;
                      $score6 = $benar6 * 60;
                      $score7 = $benar7 * 70;
                      $score8 = $benar8 * 75;
                      $score9 = $benar9 * 80;
                     
                      $hasil = 300 + $score1 + $score2 + $score3 + $score4 + $score5 + $score6 + $score7 + $score8 + $score9; 

                      $id = $currentUser['id'];
                      $update = "update user set pengetahuan_kuantitatif = '$hasil' where id = '$id'";
                      $sql    = mysqli_query($koneksi, $update);

                      

                  }
              }
						?>

    <script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
			crossorigin="anonymous"
		></script>
	</body>
</html>
