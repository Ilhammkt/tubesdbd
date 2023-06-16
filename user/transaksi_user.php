<?php
include_once("../config.php");
session_start();
$id_pelanggan = $_SESSION['id'];
$username = $_SESSION['username'];
$transaksi = mysqli_query($koneksi, "SELECT * FROM tabel_transaksi WHERE id_akun=$id_pelanggan");
?>


<html>

<head>
    <title>tracking order</title>
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <style>
        body {
            background-image: url(../css/bgsemua.svg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="mb-5">
        <img class="logo" src="../css/logo.png"></li>
        <div class="navbar">
            <ul>
                <li><a href="dashboard_user.php">Beranda</a></li>
                <li><a href='pilih_menu.php'>Menu</a></li>
                <li><a href='transaksi_user.php'>Transaski</a></li>
                <li><a href="../login.php"><button type="button" class="btn btn-outline-danger">Keluar</button></a></li>
            </ul>
        </div>
    </div>

    <div class="p-5">
        <div class="p-5">
            <h2 class="pt-5 warna2">TRANSAKSI KAMU DI KANTIN KUY!</h2>

            <div class="table-responsive">
                <table class="table table-light table-hover">
                    <thead class="table-success">
                        <tr>
                            <td class="warna3">Id_transaksi</td>
                            <td class="warna3">Nama</td>
                            <td class="warna3">Order</td>
                            <td class="warna3">Tanggal_beli</td>
                            <td class="warna3">Jumlah</td>
                            <td class="warna3">Total</td>
                            <td class="warna3">Status</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($data_transaksi = mysqli_fetch_array($transaksi)) {
                            $id_food = $data_transaksi['id_menu'];
                            $menu = mysqli_query($koneksi, "SELECT * FROM tabel_menu WHERE id_menu=$id_food");
                            $data_menu = mysqli_fetch_array($menu);
                            $total_harga = $data_transaksi['jumlah'] * $data_menu['harga'];
                            echo "<tr>";
                            echo "<td>" . $data_transaksi['id_transaksi'] . "</td>";
                            echo "<td>" . $username . "</td>";
                            echo "<td>" . $data_menu['nama'] . "</td>";
                            echo "<td>" . $data_transaksi['tanggal_beli'] . "</td>";
                            echo "<td>" . $data_transaksi['jumlah'] . "</td>";
                            echo "<td>Rp " . $total_harga . "</td>";
                            echo "<td>" . $data_transaksi['status'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
            </div>
        </div>
        </table>
</body>

</html>