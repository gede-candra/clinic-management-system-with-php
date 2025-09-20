<!-- Ubah Profil - Admin -->
<div class="bg-white w-full p-8 rounded-md shadow flex flex-col items-center">
  <form action="" method="post" class="flex flex-col gap-8 text-sm w-full    lg:w-2/3">
    <div class="w-full"><input type="password" name="pass_lama" class="p-2 w-full outline-none border-b-2" placeholder="Masukkan Password Lama"></div>
    <div class="w-full"><input type="password" name="pass_baru" class="p-2 w-full outline-none border-b-2" placeholder="Masukkan Password Baru"></div>
    <div class="w-full"><input type="password" name="konfir_pass" class="p-2 w-full outline-none border-b-2" placeholder="Konfirmasi Password Baru"></div>
    <div class="w-full flex justify-between">
      <button type="reset" class="border-2 border-yellow-500 p-2 w-24 text-yellow-500    hover:bg-yellow-500 hover:text-white">Reset</button>
      <button type="submit" name="ubah_pass" class="bg-blue-500 p-2 w-24 text-white    hover:bg-blue-400 ">Simpan</button>
    </div>
  </form>
  <?php
  if (isset($_POST['ubah_pass'])) {
    $pass_lama = $_POST['pass_lama'];
    $pass_baru = $_POST['pass_baru'];
    $konfir_pass = $_POST['konfir_pass'];
    if ($pass_lama == $data['pass_admin']) {
      if ($konfir_pass == $pass_baru) {
        $sql = "UPDATE tb_admin SET pass_admin = '$konfir_pass' WHERE id_admin = '$data[id_admin]'";
        $hasil = $koneksi->query($sql);
        if ($hasil) {
          $kueri = "SELECT * FROM tb_admin WHERE id_admin = '$data[id_admin]'";
          $hasil_session = $koneksi->query($kueri);
          $_SESSION['hak_akses'] = $hasil_session->fetch_assoc();
          echo "<script>alert(' -PASSWORD BERHASIL DIRUBAH- ');</script>";
          echo "<script>location='$baseUrl';</script>";
        }else{
          echo "<script>alert('MAAF SISTEM ERROR');</script>";
        }
      } else {
        echo "<script>alert('Maaf Konfirmasi password salah');</script>";
      }
    } else {
      echo "<script>alert('Maaf Password lama anda salah');</script>";
    }
  }
  ?>
</div>