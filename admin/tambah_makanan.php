<!DOCTYPE html>

<?php
include_once('../config.php');
session_start();
$result= mysqli_query($koneksi,"SELECT * FROM tabel_makanan");
?>

<html lang="en">
<head>
    <title>Tambah Makanan - Admin</title>
</head>
<body>
    <a href="dashboard_admin.php">Back.</a>
    </br>
    <form action="tambah_makanan.php" method="post" name="form_makanan">
        <table width="25%" border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="decs"></td>
            </tr>
            <tr>
                <td>ID Kategori</td>
                <td><input type="number" name="id_category"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok"></td>
            </tr>
            <tr>
                <td>ketersediaan</td>
                <td><input type="radio" name="avail" value='ready'>Ready</td>
                <td><input type="radio" name="avail" value='not_ready'>Not Available</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $decs = $_POST['decs'];
        $id_cate = $_POST['id_category'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $avail = $_POST['avail'];

        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO tabel_makanan(nama,decs,id_category,harga,stok,avail) VALUES('$nama','$decs','$id_cate','$harga','$stok','$avail')");

        // Show message when user added
        echo "Food added successfully.";
        header('Location: dashboard_admin.php');
    }
    ?>
</body>
</html>