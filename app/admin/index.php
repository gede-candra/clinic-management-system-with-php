<?php
session_start();

// Tentukan base url sekali saja
$baseUrl = dirname($_SERVER['SCRIPT_NAME']) . '/';

// ##########   USER PROFIL Akses   ##########
if (!isset($_SESSION['hak_akses']) || empty($_SESSION['hak_akses'])) {
  header('location:../../app');
  exit;
}

if ($_SESSION['lvl'] !== "admin") {
  header('location:../../app');
  exit;
}

require_once __DIR__ . '/../Sistem/koneksi.php';

// ########## ROUTER ##########
$routes = [
  // Sidebar menu
  'Obat'                => ['Data Obat', 'dataobat/index.php', 'flex'],
  'Poli'                => ['Data Poli', 'datapoli/index.php', 'flex'],
  'Pendaftaran'         => ['Pendaftaran Pasien', 'datapendaftaran/index.php', 'flex'],
  'Resep'               => ['Data Resep', 'dataresep/index.php', 'flex'],
  'DataAdmin'           => ['Data User Admin', 'dataadmin/index.php', 'flex'],
  'DataPasien'          => ['Data User Pasien', 'datapasien/index.php', 'flex'],
  'DataDokter'          => ['Data User Dokter', 'datadokter/index.php', 'flex'],

  // Profil Fitur
  'EditProfil'          => ['Edit Profil', 'editprofil.php', 'hidden'],
  'UbahPass'            => ['Ubah Password', 'ubahpassword.php', 'hidden'],

  // Edit Data
  'EditDataAdmin'       => ['Edit Data Admin', 'dataadmin/edit.php', 'hidden'],
  'EditDataDokter'      => ['Edit Data Dokter', 'datadokter/edit.php', 'hidden'],
  'EditDataPasien'      => ['Edit Data Pasien', 'datapasien/edit.php', 'hidden'],
  'EditDataObat'        => ['Edit Data Obat', 'dataobat/edit.php', 'hidden'],
  'EditDataPoli'        => ['Edit Data Poli', 'datapoli/edit.php', 'hidden'],
  'EditDataPendaftaran' => ['Edit Data Pendaftaran', 'datapendaftaran/edit.php', 'hidden'],
  'EditDataResep'       => ['Edit Data Resep', 'dataresep/edit.php', 'hidden'],
];

$pageAdm = $_GET['pageAdm'] ?? null;

if ($pageAdm && isset($routes[$pageAdm])) {
  $_SESSION['judulmenu']     = $routes[$pageAdm][0];
  $_SESSION['linkmenu']      = $routes[$pageAdm][1];
  $_SESSION['classcaridata'] = $routes[$pageAdm][2];
}
else {
  $_SESSION['judulmenu']     = 'Dashboard';
  $_SESSION['linkmenu']      = 'dashboard.php';
  $_SESSION['classcaridata'] = 'hidden';
}

$data = $_SESSION['hak_akses'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($_SESSION['judulmenu']); ?> - Jaya Sejahtera</title>
  <link rel="stylesheet" href="../../assets/tailwind/public/css/styles.css">
  <link rel="stylesheet" href="../../assets/fontawesome-free-5.15.3-web/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/komponen.css">
</head>

<body class="bg-gray-100">

  <!-- Navigasi -->
  <nav
    class="w-52 h-screen bg-yellow-500 fixed text-white z-30 transform -translate-x-64 transition duration-700 lg:transform-none"
    id="navbar">
    <div class="p-4 flex flex-col items-center text-center gap-2 border-b-2 border-yellow-300">
      <div class="bg-white w-20 h-20 rounded-full"><img src="" alt=""></div>
      <div>
        <h1 class="font-bold text-lg">Jaya Sejahtera</h1>
        <p class="text-sm">Sistem Aplikasi Poliklinik</p>
      </div>
    </div>
    <div>
      <ul class="transition -translate-x-60 duration-600" id="menu_sidebar">
        <a href="<?= $baseUrl ?>">
          <li class="px-5 py-2 hover:bg-white hover:text-yellow-500"><i class="fas fa-tachometer-alt w-7"></i>Dashboard
          </li>
        </a>
        <li id="user_btn"
          class="px-5 py-2 hover:bg-white hover:text-yellow-500 cursor-pointer flex justify-between items-center">
          <span><i class="fas fa-users w-7"></i>User</span><i class="fas fa-chevron-right text-xs"></i></li>
        <a href="<?= $baseUrl ?>?pageAdm=Obat">
          <li class="px-5 py-2 hover:bg-white hover:text-yellow-500"><i class="fas fa-capsules w-7"></i>Obat</li>
        </a>
        <a href="<?= $baseUrl ?>?pageAdm=Poli">
          <li class="px-5 py-2 hover:bg-white hover:text-yellow-500"><i class="fas fa-clinic-medical w-7"></i>Poli</li>
        </a>
        <a href="<?= $baseUrl ?>?pageAdm=Pendaftaran">
          <li class="px-5 py-2 hover:bg-white hover:text-yellow-500"><i class="fas fa-notes-medical w-7"></i>Pendaftaran
          </li>
        </a>
        <a href="<?= $baseUrl ?>?pageAdm=Resep">
          <li class="px-5 py-2 hover:bg-white hover:text-yellow-500"><i class="fas fa-clipboard-list w-7"></i>Resep</li>
        </a>
      </ul>

      <ul class="hidden transition -translate-x-60 duration-600" id="menu_user">
        <div class="flex justify-between px-5 pt-2 pb-4">
          <span class="cursor-pointer" id="kembali_user"><i class="fas fa-chevron-left w-4 text-xs"></i>kembali</span>
          <p class="font-bold text-yellow-200 border-b-2 border-yellow-200 rounded-r-full w-10">User</p>
        </div>
        <a href="<?= $baseUrl ?>?pageAdm=DataAdmin">
          <li class="px-7 py-2 hover:bg-white hover:text-yellow-500"><i class="fas fa-user-cog w-7"></i>Admin</li>
        </a>
        <a href="<?= $baseUrl ?>?pageAdm=DataDokter">
          <li class="px-7 py-2 hover:bg-white hover:text-yellow-500"><i class="fas fa-user-md w-7"></i>Dokter</li>
        </a>
        <a href="<?= $baseUrl ?>?pageAdm=DataPasien">
          <li class="px-7 py-2 hover:bg-white hover:text-yellow-500"><i class="fas fa-hospital-user w-7"></i>Pasien</li>
        </a>
      </ul>
    </div>
  </nav>

  <!-- MODAL User Profil -->
  <div id="user_profil"
    class="hidden fixed bg-black bg-opacity-40 w-full h-screen z-50 justify-center items-center duration-500">
    <div id="user_profil_child"
      class="bg-white w-80 shadow-lg rounded-md flex flex-col items-center p-5 font-bold transform -translate-y-full duration-500 relative">
      <button type="button" onclick="CloseUserProfil()" class="z-50 absolute right-4 top-3"><i
          class="fas fa-times text-xl"></i></button>
      <div class="w-16 h-16"><img src="../../assets/img/gambar4.png" alt=""></div>
      <h1><?= htmlspecialchars($data['username_admin']); ?></h1>
      <p class="opacity-40 text-sm">Admin</p>
      <div class="w-full overflow-x-auto">
        <table class="font-normal mt-2 text-xs w-full">
          <tr class="bg-gray-100">
            <td class="p-2">Nama Lengkap</td>
            <td class="p-2">:</td>
            <td class="p-2"><?= htmlspecialchars($data['nama_admin']); ?></td>
          </tr>
          <tr>
            <td class="p-2">Email</td>
            <td class="p-2">:</td>
            <td class="p-2"><?= htmlspecialchars($data['email_admin']); ?></td>
          </tr>
          <tr class="bg-gray-100">
            <td class="p-2">No HP</td>
            <td class="p-2">:</td>
            <td class="p-2"><?= htmlspecialchars($data['no_telp_admin']); ?></td>
          </tr>
        </table>
      </div>
      <div class="flex flex-col mt-4 w-full text-center text-xs gap-2">
        <a href="?pageAdm=EditProfil">
          <div
            class="border-2 border-yellow-400 p-2 rounded-lg font-bold text-yellow-400 hover:bg-yellow-400 hover:text-white">
            Edit Profil</div>
        </a>
        <a href="?pageAdm=UbahPass">
          <div
            class="border-2 border-yellow-400 p-2 rounded-lg font-bold text-yellow-400 hover:bg-yellow-400 hover:text-white">
            Ubah Password</div>
        </a>
        <a href="<?= $baseUrl ?>logout.php" onclick="return confirm('Yakin ingin KELUAR?')">
          <div
            class="mt-4 border-2 border-red-500 p-2 rounded-lg font-bold text-red-500 hover:bg-red-500 hover:text-white">
            Logout</div>
        </a>
      </div>
    </div>
  </div>

  <!-- Konten -->
  <div class="w-full lg:pl-52">
    <!-- nav konten -->
    <div class="fixed right-0 w-full lg:pl-52">
      <div class="px-5 bg-white shadow-md h-14 flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
          <h1 class="text-yellow-500 font-bold border-b-2 border-yellow-500 px-2">
            <?= htmlspecialchars($_SESSION['judulmenu']); ?></h1>
          <form
            class="bg-gray-50 <?= $_SESSION['classcaridata']; ?> items-center gap-3 px-2 rounded-full shadow-md text-sm w-8 h-8 overflow-hidden duration-700 hover:w-52">
            <div><i class="fas fa-search text-gray-400"></i></div>
            <input type="search" name="caridata" placeholder="Cari <?= htmlspecialchars($_SESSION['judulmenu']); ?>"
              autocomplete="off" class="w-full bg-transparent focus:outline-none">
          </form>
        </div>
        <div class="flex items-center gap-2">
          <div id="btn_user_profil" class="flex gap-2 cursor-pointer">
            <div class="text-right text-xs border-r-2 pr-2 hidden lg:block">
              <p class="text-sm"><?= htmlspecialchars($data['username_admin']); ?></p>
              <p class="text-gray-400">Admin</p>
            </div>
            <div class="w-8 h-8 rounded-full"><img src="../../assets/img/gambar4.png" alt=""></div>
          </div>
          <div class="text-yellow-500 lg:hidden">
            <button type="button" id="humberger"><i class="fas fa-stream"></i></button>
          </div>
        </div>
      </div>
    </div>

    <!-- isi konten -->
    <div class="w-full h-full pt-14">
      <div class="p-5">
        <?php include $_SESSION['linkmenu']; ?>
      </div>
    </div>
  </div>

  <!-- javascript -->
  <script src="../../assets/js/app.js"></script>
</body>

</html>