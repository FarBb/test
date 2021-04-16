<?php
$tampil = mysqli_query($conn, "SELECT * FROM tb_score WHERE id_users='$id'");
$hasil = mysqli_fetch_assoc($tampil);

$cek = mysqli_num_rows($tampil);
?>
<?php if ($cek == 1) { ?>
  <div class="container">
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <center>
                  <h1 class="font-weight-bold text-info text-uppercase mb-4">Hasil Test Anda</h1>
                </center>
                <center>
                  <h1 class="mb-0 mr-3 font-weight-bold text-gray-800"><?= $hasil['nilai'] ?> Point</h1>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } else { ?>
  <div class="container">
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <center>
                  <h1 class="font-weight-bold text-info text-uppercase mb-4">Anda Belum Melakukan Test</h1>
                </center>
                <center>
                  <h1 class="mb-0 mr-3 font-weight-bold text-gray-800">Silahkan Test Terlebih Dahulu!</h1>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>