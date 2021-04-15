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
              <i class="fas fa-phone fa-4x text-success-700"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  $tampil = mysqli_query($conn, "SELECT * FROM tb_score WHERE id_users='$id'");
  $hasil = mysqli_fetch_assoc($tampil);
  ?>

  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <h5 class="font-weight-bold text-info text-uppercase mb-2">Hasil Test</h5>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <h2 class="mb-0 mr-3 font-weight-bold text-gray-800"><?= $hasil['nilai'] ?> Point</h2>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-4x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->