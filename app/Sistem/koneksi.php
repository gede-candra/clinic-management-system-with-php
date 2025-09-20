<?php
require __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

// load .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// ambil variabel dari .env
$host     = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$pass     = $_ENV['DB_PASS'];
$dbname   = $_ENV['DB_NAME'];

$koneksi  = new mysqli($host, $username, $pass, $dbname);

if ($koneksi->connect_error) {
    echo "Maaf Koneksi Gagal: " . $koneksi->connect_error;
    exit;
}
