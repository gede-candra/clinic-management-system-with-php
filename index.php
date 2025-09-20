<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

if (!empty($_ENV['APP_DEBUG']) && $_ENV['APP_DEBUG'] === 'true') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

require_once __DIR__ . '/app/Sistem/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jaya Sejahtera</title>
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<body>
  <div class="sampul">
    <div class="kontainer">
      <div class="userlogo"><i class="fas fa-user-circle"></i></div>
      <h1>Login - Jaya Sejahtera</h1>
      <form action="" method="post">
        <div>
          <label for="">Username</label>
          <input type="text" placeholder="Masukkan Username" name="username">
        </div>
        <div>
          <label for="">Password</label>
          <input type="password" placeholder="Masukkan password" name="pass">
        </div>
        <button type="submit" name="login">Login</button>
        <div class="fitur">
          <a href="lupapassword.php">Lupa Password?</a>
          <a href="register.php">Register</a>
        </div>
      </form>
      <?php
      if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $pass     = $_POST['pass'];
        $sql    = "SELECT * FROM tb_admin WHERE username_admin = '$username' AND pass_admin = '$pass'";
        $hasil  = $koneksi->query($sql);
        $pecah  = $hasil->num_rows;
        if($pecah > 0) {
          $_SESSION['admin'] = $hasil->fetch_assoc();
      ?> 
          <div class="alert alert-berhasil">
            <b>
              <p>LOGIN BERHASIL</p>
            </b>
          </div>
          <?php echo "<meta http-equiv='refresh' content='1;url=app/admin'> </meta>"; ?>
        <?php } else { ?>
          <div class="alert alert-gagal">
            <b>
              <p>!!! Maaf Login Gagal !!!</p>
            </b>
            <p>Silahkan cek username atau password anda.</p>
          </div>
      <?php
        }
      }
      ?>

    </div>
  </div>
</body>

</html>