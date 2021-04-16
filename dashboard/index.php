<?php require 'template/header.php' ?>
<?php
if (isset($_GET['dashboard'])) {
  include "view/dashboard.php";
} elseif (isset($_GET['menu_ujian'])) {
  include "view/menu_ujian.php";
} elseif (isset($_GET['tes'])) {
  include "view/soal.php";
} elseif (isset($_GET['hasil'])) {
  include "view/hasil.php";
} else {
  include "view/error.php";
}
?>
<?php require 'template/footer.php'; ?>