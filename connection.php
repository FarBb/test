<?php
session_start();

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
