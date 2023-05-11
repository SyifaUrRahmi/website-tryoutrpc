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
		<title>SNBT | HASIL</title>
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
			    
		 <div align="center"> 
      <div
			class="p-3 m-3"
		  >
         <br><br><br>
      <p><b>Mohon Maaf saat ini belum ada tryout!</b></p><br><br><br>
      </div class="text-center">
      <a href="index.php" class="btn btn-warning text-light mb-3">Home</a>
		</div>
		</div>
		<br><br><br><br><br><br><br><br><br><br><br><br>

    <script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
			crossorigin="anonymous"
		></script>
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