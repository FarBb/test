<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$servername = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'db_soal';

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  die("connection failed : " . mysqli_connect_error());
}

function base_url($url = null)
{
  $base_url = "http://localhost/test";

  if ($url != null) {
    return $base_url . "/" . $url;
  } else {
    return $base_url;
  }
}

function query($kuery)
{
  global $conn;
  $result = mysqli_query($conn, $kuery);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function register($data)
{
  global $conn;

  $nama  = stripslashes($data["name"]);
  $user  = strtolower(stripslashes($data["username"]));
  $pass  = $data["password1"];
  $pass1 = $data["password2"];

  $cek_username = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$user'");

  if (mysqli_fetch_assoc($cek_username)) {
    $_SESSION['error'] = 'Username Sudah Terdaftar';
    header("Location:registrasi.php");
    exit(0);
    return false;
  }

  if ($pass !== $pass1) {
    $_SESSION['error1'] = 'Username Sudah Terdaftar';
    header("Location:registrasi.php");
    exit(0);
    return false;
  }

  $enkripsi_password = password_hash($pass, PASSWORD_DEFAULT);

  $query = "INSERT INTO tb_users VALUES ('','$nama','$user','$enkripsi_password')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
