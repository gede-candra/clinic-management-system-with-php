
<!-- Edit Data Pendaftaran - Admin -->
<div class="bg-white w-full p-8 rounded-md shadow flex flex-col items-center">
    <form action="" method="post" class="flex flex-col gap-8 text-sm w-full    lg:w-2/3">
      <div class="w-full">
        <select class="w-full border-2 p-2 cursor-pointer">
          <option value="" selected disabled>-- Pasien --</option>
          <option value="">Darmawan</option>
          <option value="">Rehan</option>
          <option value="">Revaldo</option>
        </select>
      </div>
      <div class="w-full">
        <label for="">Tanggal Daftar</label>
        <input type="date" class="p-2 w-full outline-none border-b-2">
      </div>
      <div class="w-full"><input type="number" class="p-2 w-full outline-none border-b-2" placeholder="No Antrean"></div>
      <div class="w-full flex justify-between">
        <button type="reset" class="border-2 border-yellow-500 p-2 w-24 text-yellow-500    hover:bg-yellow-500 hover:text-white">Reset</button>
        <button type="button" class="bg-blue-500 p-2 w-24 text-white      hover:bg-blue-400">Simpan</button>
      </div>
    </form>
</div>