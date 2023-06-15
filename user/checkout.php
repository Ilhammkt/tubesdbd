<?php
include_once("../config.php");
session_start();
$id_pelanggan=$_SESSION['id'];
$makanan=mysqli_query($koneksi, "SELECT * FROM tabel_makanan WHERE id_makanan=");
?>

<html>
    <head>
        <title>checkout.</title>
    </head>
    <body>
        <a href="pilih_makanan.php">back.</a>
        <table border="2" width="80%">
            <tr>
                <td>nama makanan</td><td>harga</td><td>jumlah</td><td>total</td>
            </tr>
            <?php
                
            ?>
        </table>

    </body>
</html>