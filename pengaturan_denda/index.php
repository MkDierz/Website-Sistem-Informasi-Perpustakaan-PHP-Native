<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once("../koneksi.php");

$query = mysqli_query($koneksi, "SELECT*FROM Denda");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 my-6 ">
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th><b>Batas Waktu Peminjaman</b></th>
                            <th><b>Denda</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($result as $results) : ?>
                            <tr>
                                <td> <?php echo $results['b_waktu_peminjaman'] ?> hari</td>
                                <td><?php echo $results['denda'] ?> hari</td>
                                <td>
                                    <a href="edit.php"> <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Edit
                                        </button></a>
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