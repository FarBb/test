<?php
require 'connection.php';
unset($_SESSION["login"]);
echo "<script>window.location='" . base_url('login.php?logout') . "' </script>";
