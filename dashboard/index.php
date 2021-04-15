<?php require 'template/header.php' ?>

<?php
if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {
  include "view/dashboard.php";
} elseif (@$_GET['page'] == 'menu_ujian') {
  include "view/menu_ujian.php";
} elseif (@$_GET['page'] == 'hasil') {
  include "view/hasil.php";
} else {
  include "view/error.php";
}
?>

<?php require 'template/footer.php'; ?>