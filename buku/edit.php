<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login/index.php?pesan=belum_login");
}
include_once("../layouts/global.php");

include_once('../koneksi.php');

$kode_buku = $_GET['kode_buku'];

$query = mysqli_query($koneksi, "SELECT * FROM buku  WHERE kode_buku='$kode_buku'LIMIT 1");
$menampilkan = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 my-6 ">
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <div class="inputs w-full max-w-2xl p-6 mx-auto">
            <div class="">
                <form aaction="update.php" method="POST" enctype="multipart/form-data" class="mt-6 border-t border-gray-400 pt-4">
                    <div class="w-full md:w-full px-3 mb-6">
                        <label for="kode_buku" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Kode Buku</label>
                        <input value="<?php echo $menampilkan['0']['kode_buku'] ?>" id="kode_buku" value="" type="text" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500" name="kode_buku" placeholder="kode buku">
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <label for="judul" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Judul</label>
                        <input value="<?php echo $menampilkan['0']['judul'] ?>" id="judul" value="" type="text" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500 " name="judul" placeholder="judul buku">
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">

                        <label for="penerbit" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Penerbit</label>
                        <input value="<?php echo $menampilkan['0']['penerbit'] ?>" id="penerbit" value="" type="text" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500 " name="penerbit" placeholder="penerbit buku">
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <label for="tahun_terbit" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Tahun Terbit</label>
                        <input value="<?php echo $menampilkan['0']['tahun_terbit'] ?>" id="tahun_terbit" value="" type="text" class="appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500 " name="tahun_terbit" placeholder="tahun terbit buku">
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <label for="sampul" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Sampul</label>

                        <div class='flex items-center justify-center w-full'>
                                    <?php if ($menampilkan['0']['sampul']) : ?>
                                        <img src="../file/<?php echo $menampilkan['0']['sampul'] ?> " width="96px" />
                                    <?php endif; ?>
                            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                    <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Pilih sampul</p>
                                </div>
                                <input id="sampul" type="file" name="file" class="hidden" />
                            </label>
                        </div>
                        <small class="">Kosongkan jika tidak ingin mengubah sampul</small>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' name="kirim">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../layouts/bawah.php");
?>