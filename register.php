<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jaya Sejahtera</title>
  <link rel="stylesheet" href="assets/css/register.css">
  <link rel="stylesheet" href="assets/fontawesome-free-5.15.3-web/css/all.min.css">
  <style>
    .kembali:hover{
      background-color: orange;
      color: white !important;
      font-weight: bold;
      letter-spacing: 1px;
    }
  </style>
</head>

<body>
  <div class="sampul">
    <div class="kontainer">
      <div class="userlogo"><i class="fas fa-user-circle"></i></div>
      <h1>Regristrasi Pasien</h1>
      <form action="" method="POST">
        <div class="col-input">
          <div>
            <label for="nik">NIK</label>
            <input type="number" placeholder="Masukkan NIK" id="nik">
          </div>
          <div>
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" placeholder="Masukkan Nama Lengkap" id="nama_lengkap">
          </div>
          <div>
            <label for="">Tanggal Lahir</label>
            <input type="date">
          </div>
        </div>
        <div class="col-input">
          <div>
            <label for="email">Email</label>
            <input type="email" placeholder="example123@mail.com" id="email">
          </div>
          <div>
            <label for="no_hp">No HP</label>
            <input type="number" placeholder="087123456789">
          </div>
          <div>
            <label for="">Alamat</label>
            <input type="text" placeholder="Masukkan Alamat">
          </div>
        </div>
        <div class="col-input">
          <div>
            <label for="username">Username</label>
            <input type="text" placeholder="Masukkan Username" id="username">
          </div>
          <div>
            <label for="">Password</label>
            <input type="password" placeholder="Masukkan password" >
          </div>
        </div>
        <div class="col-input">
          <a href="../Poliklinik" class="kembali" style="display: flex; justify-content:center; align-items:center; text-decoration: none; border: 2px solid; width: 100%; height: 35px; color: orange; margin-top: 10px; border-radius: 30px; transition: 0.3s;">Kembali</a>
          <button type="submit" style="transition: 0.3s;">Register</button>
        </div>
      </form>
      <?php ?>
      <!-- <div class="alert alert-berhasil">
        <b>
          <p>REGRISTRASI BERHASIL</p>
        </b>
      </div> -->
      <div class="alert alert-gagal">
        <b>
          <p>!!! Maaf Regristrasi Gagal !!!</p>
        </b>
      </div>
    </div>
  </div>
</body>

</html>