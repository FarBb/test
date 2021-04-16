<?php
require_once '../../connection.php';

$id_user = $_SESSION['id'];

$tampil = mysqli_query(
  $conn,
  "SELECT j.*, s.* FROM tb_jawaban_user AS j JOIN tb_soal AS s ON j.id_soal = s.id
  WHERE j.id_user = '$id_user' AND j.jawab = s.jawaban"
);

$jumlah_benar = mysqli_num_rows($tampil);

// var_dump($jumlah_benar);
// die;

$s = mysqli_query(
  $conn,
  "SELECT j.*, s.* FROM tb_jawaban_user AS j INNER JOIN tb_soal AS s
ON j.id_soal = s.id
WHERE j.id_user = '$id_user'"
);

$soal = mysqli_num_rows($s);

$nilai = $jumlah_benar * 100 / $soal;

// var_dump($nilai);
// die;

$insert = mysqli_query($conn, "INSERT INTO tb_score set 
id_users = '$id_user', 
nilai = '$nilai'");


header("location:../index.php?hasil");
