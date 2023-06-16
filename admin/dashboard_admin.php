<!DOCTYPE html>

<?php
include_once('../config.php');
session_start();
$result = mysqli_query($koneksi, "SELECT * FROM tabel_menu");
$transaksi = mysqli_query($koneksi, "SELECT * FROM tabel_transaksi");
?>

<html lang="en">

<head>
    <title>Dasboard - Admin</title>
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        body {
            background-image: url(../css/bgsemua.svg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>


<body>
    <div class="mt-3">
        <img class="logo" src="../css/logo.png"></li>
        <div class="navbar mt-2 bar">
            <ul>
                <li><a href="dashboard_admin.php">Beranda</a></li>
                <li><a href='dashboard_admin.php'>Menu</a></li>
                <li><a href='transaksi.php'>Transaksi</a></li>
                <li><a href="../login.php"><button type="button" class="btn btn-outline-danger">Keluar</button></a></li>
            </ul>
        </div>
    </div>

    <div class="pt-5"></div>

    <div class="mx-5">
        <div class="m-5">
            <h2 class="pt-5 warna2">Tambah Menu</h2>
            <form method="post" name="form_menu">
                <div>
                    <table class="mt-2">
                        <tr>
                            <td class="warna3" width="40%">Nama</td>
                            <td><input type="text" name="nama" placeholder="Masukkan Nama Menu"></td>
                        </tr>
                    </table>

                    <table class="mt-2">
                        <tr>
                            <td class="warna3" width="40%">Deskripsi</td>
                            <td><input type="text" name="decs" placeholder="Masukkan Deskripsi"></td>
                        </tr>
                    </table>

                    <table class="mt-2">
                        <tr>
                            <td class="warna3" width="40%">ID Kategori</td>
                            <td><input type="number" name="id_category" placeholder="Masukkan ID Kategori"></td>
                        </tr>
                    </table>

                    <table class="mt-2">
                        <tr>
                            <td class="warna3" width="40%">Harga</td>
                            <td><input type="number" name="harga" placeholder="Masukkan Harga"></td>
                        </tr>
                    </table>

                    <table class="mt-2">
                        <tr>
                            <td class="warna3" width="40%">Stok</td>
                            <td><input type="number" name="stok" placeholder="Masukkan Stok"></td>
                        </tr>
                    </table>

                    <table class="mt-2">
                        <tr>
                            <td class="warna3" width="40%">ketersediaan</td>
                            <td><input type="radio" name="avail" value="ready">Ready</td>
                            <td><input class="ms-4" type="radio" name="avail" value="not_ready">Not Available</td>
                        </tr>
                    </table>
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-success" name="simpan_menu">Simpan</button>
                </div>
            </form>
        </div>

        <?php
        // Check If form submitted, insert form data into users table.
        if (isset($_POST['simpan_menu'])) {
            $nama = $_POST['nama'];
            $decs = $_POST['decs'];
            $id_cate = $_POST['id_category'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $avail = $_POST['avail'];

            // Insert user data into table
            $result = mysqli_query($koneksi, "INSERT INTO tabel_menu(nama,decs,id_category,harga,stok,avail) VALUES('$nama','$decs','$id_cate','$harga','$stok','$avail')");

            // Show message when user added
            echo "Food added successfully.";
            header('Location: dashboard_admin.php');
        }
        ?>



        <div class="m-5">
            <h2 class="warna2">MENU KANTIN KUY!</h2>

            <div class="table-responsive">
                <table class="table table-light table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Nama menu</th>
                            <th>Deskripsi</th>
                            <th>ID Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Ketersediaan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $data['id_menu'] . "</td>";
                            echo "<td>" . $data['nama'] . "</td>";
                            echo "<td>" . $data['decs'] . "</td>";
                            echo "<td>" . $data['id_category'] . "</td>";
                            echo "<td>" . $data['harga'] . "</td>";
                            echo "<td>" . $data['stok'] . "</td>";
                            echo "<td>" . $data['avail'] . "</td>";
                            echo "<td><a type='button' class='btn btn-success' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .90rem;' href='edit_menu.php?id=$data[id_menu]'>Edit</a> <a type='button' class='btn btn-danger' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .90rem;' href='delete_menu.php?id=$data[id_menu]'>Delete</a></td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>