<!DOCTYPE html>
<?php
include_once('../config.php');
session_start();
$result = mysqli_query($koneksi, 'SELECT * FROM tabel_menu WHERE avail!="not_ready"');
$result_kategori = mysqli_query($koneksi, "SELECT * FROM tabel_kategori");
$kategori = mysqli_fetch_array($result_kategori);
?>

<html>

<head>
    <title>Pilih Menu</title>
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

    <div class="pt-5"></div>

    <div class="px-5">
        <div class="p-5">
            <h2 class="warna2">MENU KANTIN KUY!</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Checkout kuy.</th>
                        </tr>
                    </thead>

                    <tbody class="table-light">
                        <?php
                        while ($data = mysqli_fetch_array($result)) {
                            $kate = $data['id_category'];
                            echo "<tr>";
                            echo "<td>" . $data['nama'] . "</td>";
                            echo "<td>" . $kategori[$kate] . "</td>";
                            echo "<td>" . $data['decs'] . "</td>";
                            echo "<td>" . $data['harga'] . "</td>";
                            echo "<td><a  type='button' class='btn btn-success' href='jumlah.php?id=$data[id_menu]' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .90rem;'>pilih</a></td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>