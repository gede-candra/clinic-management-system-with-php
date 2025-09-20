
<!-- Ubah Profil - Admin -->
<div class="bg-white w-full p-8 rounded-md shadow flex flex-col items-center">
    <form action="" method="post" class="flex flex-col gap-8 text-sm w-full    lg:w-2/3">
      <div class="w-full">
        <label for="chooseFile">Ubah Foto Profil</label>
        <input id="chooseFile" type="file" name="foto" class="p-2 w-full outline-none border-b-2" accept="image/*" c>
      </div>
      <div class="w-full"><input type="text" name="username" class="p-2 w-full outline-none border-b-2" placeholder="Username" value="<?= $data['username_admin']; ?>"></div>
      <div class="w-full"><input type="text" name="nama" class="p-2 w-full outline-none border-b-2" placeholder="Nama Lengkap" value="<?= $data['nama_admin']; ?>"></div>
      <div class="w-full"><input type="email" name="email" class="p-2 w-full outline-none border-b-2" placeholder="Email" value="<?= $data['email_admin']; ?>"></div>
      <div class="w-full"><input type="text" name="no_telp" class="p-2 w-full outline-none border-b-2" placeholder="No HP" value="<?= $data['no_telp_admin']; ?>"></div>
      <div class="w-full flex justify-between">
        <button type="reset" name="reset" class="border-2 border-yellow-500 p-2 w-24 text-yellow-500    hover:bg-yellow-500 hover:text-white">Reset</button>
        <button type="submit" name="edit" class="bg-blue-500 p-2 w-24 text-white      hover:bg-blue-400">Simpan</button>
      </div>
    </form>
    <?php
    if(isset($_POST['edit'])){
      $foto = $_POST['foto'];
      $username = $_POST['username'];
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $no_telp = $_POST['no_telp'];
      $id     = $data['id_admin'];

      $sql_edit    = "UPDATE tb_admin SET foto_admin = '$foto', nama_admin = '$nama', username_admin = '$username', email_admin = '$email', no_telp_admin = '$no_telp' WHERE id_admin = '$id'";
      $hasil_edit  = $koneksi->query($sql_edit);
      
      if ($hasil_edit) {
        $kueri = "SELECT * FROM tb_admin WHERE id_admin = '$id'";
        $hasil_session = $koneksi->query($kueri);
        $_SESSION['hak_akses'] = $hasil_session->fetch_assoc();
        echo "<script>alert('Data Behasil Di Ubah');</script>";
        echo "<script>location='$baseUrl';</script>";
      }
      else{
        echo "<script>alert('Maaf Data Tidak Dapat Di Ubah');</script>";
      }
    }
    ?>
</div>