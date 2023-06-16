<?php
include_once("../config.php");
session_start();
$id_pelanggan = $_SESSION['id'];
$menu = mysqli_query($koneksi, "SELECT * FROM tabel_menu WHERE id_menu=");
?>

<html>

<head>
    <title>checkout.</title>
</head>

<body>
    <a href="pilih_menu.php">back.</a>
    <table border="2" width="80%">
        <tr>
            <td>nama menu</td>
            <td>harga</td>
            <td>jumlah</td>
            <td>total</td>
        </tr>
        <?php

        ?>
    </table>

</body>

</html>