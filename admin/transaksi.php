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
    <img class="logo" src="../css/logo.png"></li>
    <div class="navbar mt-4 bar">
        <ul>
            <li><a href="dashboard_admin.php">Beranda</a></li>
            <li><a href='dashboard_admin.php'>Menu</a></li>
            <li><a href='transaksi.php'>Transaksi</a></li>
            <li><a href="../login.php"><button type="button" class="btn btn-outline-danger">Keluar</button></a></li>
        </ul>
    </div>

    <div class="p-5">
        <div class="p-5">
            <h2 class="pt-5 warna2">TRANSAKSI KANTIN KUY!</h2>

            <div class="table-responsive">
                <table class="table table-light table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>ID_transaksi</th>
                            <th>ID_pembeli</th>
                            <th>ID_menu</th>
                            <th>Tanggal_beli</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($data_transaksi = mysqli_fetch_array($transaksi)) {
                            $id_menu = $data_transaksi['id_menu'];
                            $id_pengguna = $data_transaksi['id_akun'];
                            $result = mysqli_query($koneksi, "SELECT * FROM tabel_menu WHERE id_menu=$id_menu");
                            $pengguna = mysqli_query($koneksi, "SELECT * FROM user_kantin WHERE id=$id_pengguna");

                            $data_pengguna = mysqli_fetch_array($pengguna);
                            $data_menu = mysqli_fetch_array($result);
                            $total_harga = $data_transaksi['jumlah'] * $data_menu['harga'];

                            echo "<tr>";
                            echo "<td>" . $data_transaksi['id_transaksi'] . "</td>";
                            echo "<td>" . $data_pengguna['username'] . "</td>";
                            echo "<td>" . $data_menu['nama'] . "</td>";
                            echo "<td>" . $data_transaksi['tanggal_beli'] . "</td>";
                            echo "<td>" . $data_transaksi['jumlah'] . "</td>";
                            echo "<td>Rp." . $total_harga . "</td>";
                            echo "<td>" . $data_transaksi['status'] . "</td>";
                            echo "<td><a type='button' class='btn btn-success' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .90rem;' href='edit_transaksi.php?id=$data_transaksi[id_transaksi]'>Edit</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>