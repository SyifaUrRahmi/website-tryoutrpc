<?php

// Lampirkan dbconfig 

require_once "dbconfig.php";

// Cek status login user 

if ($user->isLoggedIn()) {

  header("location: index.php"); //Redirect ke index 

}

//Cek adanya data yang dikirim 

if (isset($_POST['signup'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  // Registrasi user baru 
  if ($user->register($nama, $email, $password)) {
    // Jika berhasil set variable success ke true 
    $success = true;
  } else {
    // Jika gagal, ambil pesan error 
    $error = $user->getLastError();
  }
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  // Proses login user 
  if ($user->login($email, $password)) {
    header("location: index.php");
  } else {
    // Jika login gagal, ambil pesan error 
    $error = $user->getLastError();
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="css_.css" />
</head>

<body>

  <section align="center" class="wrapper col-md-6 col-lg-4 bg-warning rounded text-light p-4 m-3" width="470px">
      <div class="form signup">

        <header class="mb-2">Daftar</header>
        <form method="post">
          <input class="mb-2" type="text" name="nama" placeholder="Nama Lengkap" required />
          <input class="mb-2" type="text" name="email" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <input class="mb-2" type="submit" name="signup" value="Daftar" />
          <?php if (isset($error)) : ?>
          <div class="error bg-danger text-light text-center rounded p-2 mb-2">
            <?php echo $error ?>
          </div>
          <?php endif; ?>
          <?php if (isset($success)) : ?>
            <div class="success bg-success text-light text-center rounded p-2 mb-2">
              Berhasil mendaftar. Silakan login!
            </div>
          <?php endif; ?>
          <br>
          <br>
        </form>
      </div>
      </div>

            <div id="login" class="form login mb-2">
        <header>Masuk</header>
        <form method="post">
          <input class="mb-3" type="text" name="email" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <input type="submit" name="login" value="Masuk" />
        </form>
      </div>

      <script>
        const wrapper = document.querySelector(".wrapper"),
          signupHeader = document.querySelector(".signup header"),
          loginHeader = document.querySelector(".login header");

        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
      </script>
    </section>
    </section>
</body>

</html>