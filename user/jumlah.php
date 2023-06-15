<?php
include_once("../config.php");
session_start();

if(isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];
    $payment = $_POST['payment'];
    $id_akun= $_SESSION['id'];
    $food_id= $_POST['id_food'];
    $date=date("Y-m-d");
    $result1 = mysqli_query($koneksi, "INSERT INTO tabel_transaksi(id_akun,id_makanan,jumlah,status,tanggal_beli) VALUES('$id_akun','$food_id','$jumlah','pending','$date')");
    header('location: dashboard_user.php');
}

?>

<html>
    <head>
        <title>jumlah makanan</title>
    </head>
    <body>
        <a href="pilih_makanan.php">kembali</a>
        <form action="jumlah.php" method="post" name="jumlah">
            <?php
            $id_makanan = $_GET['id'];
            $result = mysqli_query($koneksi, "SELECT * FROM tabel_makanan WHERE id_makanan=$id_makanan");
            while($data = mysqli_fetch_array($result)) {
                $nama = $data['nama'];
                $decs = $data['decs'];
                $harga = $data['harga'];
            }
            ?>
            <table border="1" width="80%">
                <tr>
                    <td>nama</td>
                    <td><?php echo $nama; ?></td>
                </tr>
                <tr>
                    <td>deskripsi</td>
                    <td><?php echo $decs; ?></td>
                </tr>
                <tr>
                    <td>harga</td>
                    <td><?php echo $harga; ?></td>
                </tr>
                <tr>
                    <td>jumlah</td>
                    <td><input type="number" name="jumlah"></td>
                </tr>
                <tr>
                    <td>Metode pembayaran</td>
                    <td><input type="radio" name="payment" value="ilhampay">Ilham_pay</td>
                    <td><input type="radio" name="payment" value="goodpay">goodpay</td>
                    <td><input type="hidden" name="id_food" value=<?php echo $id_makanan; ?>></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value"submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>