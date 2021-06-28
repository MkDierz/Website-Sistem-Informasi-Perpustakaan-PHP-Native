<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once("../koneksi.php");

$query = mysqli_query($koneksi, "SELECT*FROM buku");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 my-6 ">
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <div class="mb-6">
            <a href="add.php" class="btn btn-primary">
                <button class="bg-green-500 hover:bg-green-200 text-white hover:text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Buku</span>
                </button>
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th><b>Kode Buku</b></th>
                            <th><b>Judul</b></th>
                            <th><b>Penerbit</b></th>
                            <th><b>Tahun Terbit</b></th>
                            <th><b>Sampul</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($result as $results) : ?>
                            <tr>
                                <td> <?php echo $results['kode_buku'] ?></td>
                                <td><?php echo $results['judul'] ?></td>
                                <td><?php echo $results['penerbit'] ?> </td>
                                <td><?php echo $results['tahun_terbit'] ?> </td>
                                <td>
                                    <?php if ($results['sampul']) : ?>
                                        <img src="../file/<?php echo $results['sampul'] ?> " width="48px" />
                                </td>
                            <?php
                                    else : ?>
                                No Image
                            <?php endif; ?>
                            <td>
                                <a href="edit.php?kode_buku=<?= $results['kode_buku'] ?>">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </button>
                                </a>
                                <a class="btn-link" href="delete.php?kode_buku=<?= $results['kode_buku'] ?>" onclick="return confirm('Yakin menghapus ?')">
                                    <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                    </button>
                                </a>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include_once("../layouts/bawah.php");
?>