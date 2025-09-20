<?php
session_start();
require_once __DIR__ . '/Sistem/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jaya Sejahtera</title>
  <link rel="stylesheet" href="../assets/css/login.css">
  <link rel="stylesheet" href="../assets/fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<body>
  <div class="sampul">
    <div class="kontainer">
      <div class="userlogo"><i class="fas fa-user-circle"></i></div>
      <h1>Login Administrator</h1>
      <form action="" method="post">
        <div>
          <label for="">Username</label>
          <input type="text" placeholder="Masukkan Username" name="username" required>
        </div>
        <div>
          <label for="">Password</label>
          <input type="password" placeholder="Masukkan password" name="pass" required>
        </div>
        <div class="fitur" style="justify-content: space-around; margin-top:5px; margin-bottom: 10px;">
          <div>
            <input id="admin" type="radio" name="level" value="admin" checked>
            <label for="admin">Admin</label>
          </div>
          <div>
            <input id="dokter" type="radio" name="level" value="dokter">
            <label for="dokter">Dokter</label>
          </div>
        </div>
        <button type="submit" name="login">Login</button>
      </form>

      <?php
      if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $pass     = $_POST['pass'];
        $level    = $_POST['level'];

        if ($level == "admin") {
          $sql = "SELECT * FROM tb_admin WHERE username_admin = '$username' AND pass_admin = '$pass'";
        }
        else {
          $sql = "SELECT * FROM tb_dokter WHERE username_dokter = '$username' AND pass_dokter = '$pass'";
        }

        $hasil = $koneksi->query($sql);
        $pecah = $hasil->num_rows;

        if ($pecah > 0) {
          $_SESSION['hak_akses'] = $hasil->fetch_assoc();
          $_SESSION['lvl']       = $level;
          ?>
          <div class="alert alert-berhasil">
            <b>
              <p>LOGIN BERHASIL</p>
            </b>
          </div>
          <?php
          // Redirect sesuai level
          if ($level == "admin") {
            header("Location: /app/admin/");
          }
          else {
            header("Location: /app/dokter/");
          }
          exit;
        }
        else { ?>
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