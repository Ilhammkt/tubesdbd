<?php
include_once("../config.php");
session_start();

if (isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];
    $payment = $_POST['payment'];
    $id_akun = $_SESSION['id'];
    $food_id = $_POST['id_food'];
    $date = date("Y-m-d");
    $result1 = mysqli_query($koneksi, "INSERT INTO tabel_transaksi(id_akun,id_menu,jumlah,status,tanggal_beli) VALUES('$id_akun','$food_id','$jumlah','pending','$date')");
    header('location: dashboard_user.php');
}

?>

<html>

<head>
    <title>Rincian Order</title>
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
        <div class="me-5">
            <form class="me-5 col-5" action="jumlah.php" method="post" name="jumlah">
                <?php
                $id_menu = $_GET['id'];
                $result = mysqli_query($koneksi, "SELECT * FROM tabel_menu WHERE id_menu=$id_menu");
                while ($data = mysqli_fetch_array($result)) {
                    $nama = $data['nama'];
                    $decs = $data['decs'];
                    $harga = $data['harga'];
                }
                ?>
                <div class="mt-5 mx-5">
                    <h2 class="warna2">MENU KANTIN KUY!</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-light">
                            <tr>
                                <td class="table-success warna3" width=300px>Nama</td>
                                <td>
                                    <?php echo $nama; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-success warna3">Deskripsi</td>
                                <td>
                                    <?php echo $decs; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-success warna3">Harga</td>
                                <td>
                                    <?php echo $harga; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-success warna3">Jumlah</td>
                                <td><input type="number" name="jumlah"></td>
                            </tr>
                            <tr>
                                <td class="table-success warna3">Metode pembayaran</td>
                                <td><input type="radio" name="payment" required>Kanpay</td><br><br>
                            </tr>
                            <input type="hidden" name="id_food" value=<?php echo $id_menu; ?>>
                        </table>
                    </div>
                    <div class="mt-2">
                        <button type="submit" name="submit" class="btn btn-success">Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>