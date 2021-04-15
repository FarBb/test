<?php
$tampil = mysqli_query($conn, "SELECT * FROM tb_score WHERE id_users='$id'");
$hasil = mysqli_fetch_assoc($tampil);
?>

<div class="container">
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <h5 class="font-weight-bold text-info text-uppercase mb-2">Hasil Test Anda</h5>
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
</div>