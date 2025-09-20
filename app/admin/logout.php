<?php
session_start();
$data = $_SESSION['hak_akses'];
if (!isset($data) || empty($data)) {
  header('location:../../app');
}

session_destroy();
header('location:../../app');
?>