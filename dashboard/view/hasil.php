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

  <?php
  $id_user = $_SESSION['id'];

  $query = "SELECT ju.*, s.* FROM tb_jawaban_user AS ju JOIN tb_soal AS s ON ju.id_soal = s.id WHERE ju.id_user = '$id_user'";

  $tampil = mysqli_query($conn, $query);

  // $data = mysqli_fetch_assoc($tampil);
  ?>

  <div class="container mt-3">
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-12 col-md-12 mb-4">
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