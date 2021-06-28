<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login/index.php?pesan=belum_login");
}
include_once("../layouts/global.php");

include_once('../koneksi.php');

$kode_anggota = $_GET['kode_anggota'];

$query = mysqli_query($koneksi, "SELECT * FROM anggota  WHERE kode_anggota='$kode_anggota'LIMIT 1");
$menampilkan = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 my-6 ">
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <div class="inputs w-full max-w-2xl p-6 mx-auto">
            <form action="store.php" method="POST" enctype="multipart/form-data" class="mt-6 border-t border-gray-400 pt-4">
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Kode anggota
                    </label>
                    <input name="kode_anggota"  id="kode_anggota" value="<?php echo $menampilkan['0']['kode_anggota'] ?>" type="text" placeholder="kode anggota" disabled class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500">
                </div>
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Nama
                    </label>
                    <input id="nama" value="<?php echo $menampilkan['0']['nama'] ?>" type="text" name="nama" placeholder="nama anggota" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500">
                </div>
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Jenis Kelamin
                    </label>
                    <div class="flex-shrink w-full inline-block relative">
                        <select name="jk" class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                            <option value="L" <?php echo ($menampilkan['0']['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-Laki</option>
                            <option value="P" <?php echo ($menampilkan['0']['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                        <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Alamat
                    </label>
                    <input id="alamat" value="<?php echo $menampilkan['0']['alamat'] ?>" type="text" name="alamat" placeholder="alamat anggota" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500">
                </div>
                <div class="w-full md:w-full px-3 mb-6">
                    <label for="sampul" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Foto</label>
                            <?php if ($menampilkan['0']['foto']) : ?>
                                <img src="../file/<?php echo $menampilkan['0']['foto'] ?> " width="96px" />
                            <?php endif; ?>
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Pilih Foto</p>
                            </div>
                            <input id="foto" type="file" name="file" class="hidden" />
                        </label>
                    </div>
                </div>
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' name="kirim">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once("../layouts/bawah.php");
?>