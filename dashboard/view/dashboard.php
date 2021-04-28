<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="info-data-login" data-infodata="<?php if (isset($_SESSION['masuk'])) {
                                                echo $_SESSION['masuk'];
                                              }
                                              unset($_SESSION['masuk']); ?>">
  </div>
  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <h2 class="mb-0 mr-3 font-weight-bold text-gray-800">Selamat Datang Di Aplikasi Ujian Online <strong><?= $c["nama"] ?></strong> </h2>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard-teacher fa-3x text-success-700"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  $tampil = mysqli_query($conn, "SELECT * FROM tb_score WHERE id_users='$id'");
  $hasil = mysqli_fetch_assoc($tampil);

  $cek = mysqli_num_rows($tampil);
  ?>

  <?php if ($cek == 1) { ?>
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-4 col-sm-12 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <h5 class="font-weight-bold text-info text-uppercase mb-2">Hasil Test</h5>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <h2 class="mb-0 mr-3 font-weight-bold text-gray-800"><?= $hasil['nilai'] ?> Point</h2>
                    <br>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-4x text-gray-300"></i>
              </div>
            </div>
            <p class="text-center" style="font-size: 170px;">
              <?php if ($hasil['nilai'] == 100) {
                echo 'A+';
              } elseif ($hasil['nilai'] >= 90 && $hasil['nilai'] < 100) {
                echo 'A';
              } elseif ($hasil['nilai'] >= 80 && $hasil['nilai'] < 90) {
                echo 'B+';
              } elseif ($hasil['nilai'] >= 70 && $hasil['nilai'] < 80) {
                echo 'B';
              } elseif ($hasil['nilai'] >= 60 && $hasil['nilai'] < 70) {
                echo 'C+';
              } elseif ($hasil['nilai'] >= 50 && $hasil['nilai'] < 60) {
                echo 'C';
              } else {
                echo 'D';
              }
              ?>
            </p>
          </div>
        </div>
      </div>

      <?php
      $id_user = $_SESSION['id'];

      $query = "SELECT ju.*, s.* FROM tb_jawaban_user AS ju JOIN tb_soal AS s ON ju.id_soal = s.id WHERE ju.id_user = '$id_user'";

      $tampil = mysqli_query($conn, $query);

      // $data = mysqli_fetch_assoc($tampil);
      ?>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-8 col-md-8 mb-4 col-sm-12">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <h2>Report Score</h2>
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Soal</th>
                      <th scope="col">Jawaban User</th>
                      <th scope="col">Jawaban Yang Bener</th>
                      <th scope="col">Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($tampil)) {
                    ?>

                      <?php if ($data['jawab'] == $data['jawaban']) {
                        $nilai = 20;
                      } else {
                        $nilai = 0;
                      } ?>

                      <?php
                      if (empty($data['jawab'])) {
                        $jawab = 'Tidak Di Jawab';
                      } else {
                        $jawab = $data['jawab'];
                      }
                      ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $data["soal"]; ?></td>
                        <td><?= $jawab ?></td>
                        <td><?= $data["jawaban"]; ?></td>
                        <td><?= $nilai ?></td>
                      </tr>
                    <?php $no++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <!-- <div class="container"> -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <center>
                  <h1 class="font-weight-bold text-info text-uppercase mb-4">Silahkan Melakukan Ujian!</h1>
                </center>
                <center>
                  <h1 class="mb-0 mr-3 font-weight-bold text-gray-800">Goodluck!</h1>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  <?php
  } ?>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->