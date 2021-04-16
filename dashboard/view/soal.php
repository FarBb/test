<?php

$id_user = $_SESSION['id'];

//Mengecek apakah user sudah memiliki skor atau tidak
$numUserScore = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_score WHERE id_users='$id_user'"));
if ($numUserScore > 0) {
  echo "<script>window.location='" . base_url('dashboard/index.php?hasil') . "'</script>";
}

$soalPerPage = 1; //maksimal data yang ditampilkan perhalaman

//menampilkan data dari database
$soal = mysqli_query($conn, "SELECT * FROM tb_soal");
//menghitung jumlah data yang ada di dalam tabel
$jumlahSoal = mysqli_num_rows($soal);

$jawabnUser = mysqli_query($conn, "SELECT * FROM tb_jawaban_user WHERE id_user = '$id_user'");
$jmlJawabUser = mysqli_num_rows($jawabnUser);
$soalSudahDijawab = array();

if ($jmlJawabUser == $jumlahSoal) {
?>
  <div class="row m-2">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <center>
                <h1 class="font-weight-bold text-info text-uppercase mb-4">
                  Anda Telah Menyelesaikan Ujian, Klik Selesai Untuk Melihat Nilai
                </h1>
              </center>
              <center>
                <a href="<?= base_url('dashboard/view/proses.php') ?>" class="btn btn-lg btn-success">
                  Selesai
                </a>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php

} else {
?>
  <!-- Modal TimeOut -->
  <div class="modal fade" id="modalTimeout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Oops, your time is up!</h5>
        </div>
        <div class="modal-body">You'll be redirected to the next question</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Next Question</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  if ($jmlJawabUser > 0) {
    while ($data = mysqli_fetch_assoc($jawabnUser)) {
      array_push($soalSudahDijawab, $data['id_soal']);
    }
  }

  $no = $jmlJawabUser + 1;
  $soal = mysqli_query($conn, "SELECT * from tb_soal ORDER BY RAND() ");

  while ($row = mysqli_fetch_assoc($soal)) :
    if ($jmlJawabUser > 0 && in_array($row['id'], $soalSudahDijawab)) {
      continue;
    }

    $jawaban = mysqli_query($conn, "SELECT * from tb_jawaban WHERE id_soal = '" . $row["id"] . "' ORDER BY RAND()  "); ?>
    <div class="container">
      <div class="row text-center alert-danger" style="padding:20px;">
        <h5 class="col-sm-12 countdown" style="font-weight: 800; font-size:20px">Waktu Pengerjaan</h5>
      </div>
    </div>
    <div class="container" style="background-color: white; padding:50px">
      <form id="form_jawab" method="POST" action="">
        <h2><?= $no; ?>. <?= $row['soal']; ?></h2>

        <div class="kotak">

          <?php
          $total = mysqli_num_rows($jawaban);
          while ($rowjwb = mysqli_fetch_assoc($jawaban)) :

            if ($total == 4) {
              $abjad = 'A';
            } elseif ($total == 3) {
              $abjad = 'B';
            } elseif ($total == 2) {
              $abjad = 'C';
            } else {
              $abjad = 'D';
            }
          ?>

            <div class="row">
              <div class="col-md-6">
                <input type="hidden" id="id" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="sementara" value="0">
                <div class="input-group" style="padding:2px;">
                  <span class="input-group-addon">
                    <input class="cursor" type="radio" id="jawaban_<?= $no; ?>" name="jawaban" value="<?= $rowjwb['opsi_jawaban'] ?>">
                  </span>
                  <input type="text" class="form-control" value="<?= $abjad . '. ' . $rowjwb['opsi_jawaban'] ?>" readonly>
                </div>
              </div>
            </div>

          <?php $total--;
          endwhile; ?>
        </div>
        <br>
        <button id="btn_pilih_<?= $no; ?>" class="btn btn-lg btn-success">Pilih</button>

      </form>
    </div>

<?php
    break;
  endwhile;

  if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $jawaban = isset($_POST['jawaban']) ? $_POST['jawaban'] : '';

    $cari = mysqli_query($conn, "SELECT * FROM tb_jawaban_user WHERE id_user='$id_user'AND id_soal ='$id'");
    $a = mysqli_num_rows($cari);

    if (mysqli_num_rows($cari) > 0) {
      $score = mysqli_fetch_assoc($cari);
      mysqli_query($conn, "UPDATE tb_jawaban_user SET jawab = '$jawaban' WHERE id_user='$id_user' AND id_soal ='$id'");
    } else {
      mysqli_query($conn, "INSERT INTO tb_jawaban_user VALUES ('','$id','$id_user','$jawaban')");
    }

    echo "<script>window.location='" . base_url('dashboard/index.php?tes') . "'</script>";
  }
}
