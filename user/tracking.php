<?php
include_once("../config.php");
session_start();
$id_pelanggan=$_SESSION['id'];
$username=$_SESSION['username'];
$transaksi=mysqli_query($koneksi,"SELECT * FROM tabel_transaksi WHERE id_akun=$id_pelanggan");
?>


<html>
    <head>
        <title>tracking order</title>

    </head>
    <body>
        <table border=2 width="50%">
            <tr>
                <td>id_transaksi</td> <td>nama</td><td>order</td><td>tanggal_beli</td><td>jumlah</td><td>total</td><td>status</td>
            </tr>
            <?php
            while($data_transaksi=mysqli_fetch_array($transaksi)){
                $id_food=$data_transaksi['id_makanan'];
                $makanan=mysqli_query($koneksi, "SELECT * FROM tabel_makanan WHERE id_makanan=$id_food");
                $data_makanan=mysqli_fetch_array($makanan);
                $total_harga=$data_transaksi['jumlah']*$data_makanan['harga'];
                echo "<tr>";
                echo "<td>".$data_transaksi['id_transaksi']."</td>";
                echo "<td>".$username."</td>";
                echo "<td>".$data_makanan['nama']."</td>";
                echo "<td>".$data_transaksi['tanggal_beli']."</td>";
                echo "<td>".$data_transaksi['jumlah']."</td>";
                echo "<td>Rp.".$total_harga."</td>";
                echo "<td>".$data_transaksi['status']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>