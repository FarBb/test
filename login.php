<?php
require 'connection.php';

if (isset($_POST['login'])) {

  $user = $_POST["username"];
  $pass = $_POST["password"];

  $cek_username = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$user'") or die(mysqli_error($conn));

  if (mysqli_num_rows($cek_username) === 1) {
    $row = mysqli_fetch_assoc($cek_username);

    if (password_verify($pass, $row['password'])) {
      $_SESSION['login'] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION['username'] = $user;
      $_SESSION['masuk'] = 'selamatDatang';
      header("Location:dashboard/index.php?dashboard");
      exit;
    } else {
      // $error = true;
      $_SESSION['error'] = '';
      header("Location:" . $_SERVER['PHP_SELF']);
      exit;
    }
  }
  $_SESSION['error'] = '';
  header("Location:" . $_SERVER['PHP_SELF']);
  exit;
}
// apabila ada session login maka tetap dihalaman index.php
if (isset($_SESSION['login'])) {
  echo "<script>window.location='" . base_url('dashboard') . "'</script>";
} else {
?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | Soal Online</title>

    <!-- Custom fonts for this template-->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo.png') ?>" type="image/x-icon">

    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

  </head>

  <body class="bg-gradient-primary">

    <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-5 col-md-5" style="margin-top: 30px;">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="pt-5 pl-5 pr-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900">Halaman Login Ujian</h1>
                    </div>
                    <div class="text-center">
                      <img style="margin-bottom: 10px;" src="<?= base_url('assets/img/logo.png') ?>" alt="logo sekolah" width="200px">
                    </div>

                    <?php if (isset($_SESSION['error'])) : ?>
                      <div class="row">
                        <div class="col-lg-12" col-lg-offset-3>
                          <div class="alert alert-danger alert-dismissable" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <div class="text-center">
                              <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                              <strong>Login Gagal!</strong> <br>
                              Username dan password salah
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php unset($_SESSION['error']);
                    endif; ?>

                    <?php if (isset($_SESSION['logout'])) : ?>
                      <div class="row">
                        <div class="col-lg-12" col-lg-offset-3>
                          <div class="alert alert-danger alert-dismissable" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <div class="text-center">
                              <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                              <strong>Login Gagal!</strong> <br>
                              Username dan password salah
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php unset($_SESSION['logout']);
                    endif; ?>

                    <?php if (isset($_SESSION["success"])) : ?>
                      <div class="row">
                        <div class="col-lg-12" col-lg-offset-3>
                          <div class="alert alert-success alert-dismissable" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <div class="text-center">
                              <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                              <strong>Registrasi Berhasil!</strong> <br>
                              Silahkan login!
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php unset($_SESSION['success']);
                    endif; ?>

                    <form class="user" method="POST" action="">
                      <div class="form-group">
                        <input type="text" autofocus autocomplete="off" class="form-control form-control-user" id="exampleInputEmail" placeholder="Enter Your Username" name="username" required>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" required>
                      </div>
                      <hr>
                      <input type="submit" class="btn btn-primary btn-user btn-block mb-4" value="Login" name="login">
                      </input>
                    </form>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-center" style="margin-top: -10px; margin-bottom:10px !important">
                <a class="small" href="registrasi.php">Buat Akun</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
  </body>

  </html>
<?php
}
?>