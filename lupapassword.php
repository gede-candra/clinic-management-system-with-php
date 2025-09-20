<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password - Jaya Sejahtera</title>
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<body>
  <div class="sampul">
    <div class="kontainer">
      <div class="userlogo"><i class="fas fa-user-circle"></i></div>
      <h1>Lupa Password</h1>
      <form action="" method="POST">
        <div>
          <label for="mail">Enter Your Email</label>
          <input type="email" placeholder="Masukkan email anda" id="mail">
        </div>
        <button type="submit">Kirim Tautan Pemulihan</button>
        <a href="../Poliklinik" class="kembali" name="kembali">Kembali</a>
      </form>
      <?php if (isset($_POST['kembali'])) {
        header('location: ../poliklinik');
      }?>
      <div class="alert alert-berhasil">
        <b>
          <p>LOGIN BERHASIL</p>
        </b>
      </div>
      <!-- <div class="alert alert-gagal">
        <b>
          <p>!!! Maaf Login Gagal !!!</p>
        </b>
        <p>Silahkan cek username atau password anda.</p>
      </div> -->
    </div>
  </div>
</body>

</html>