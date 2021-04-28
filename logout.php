<?php
require 'connection.php';
unset($_SESSION["login"]);
$_SESSION['logout'] = true;
echo "<script>window.location='" . base_url('login.php?logout') . "' </script>";
