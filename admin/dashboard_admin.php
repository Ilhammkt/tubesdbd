<!DOCTYPE html>

<?php
include_once('../config.php');
session_start();
$result= mysqli_query($koneksi,"SELECT * FROM tabel_makanan");
$transaksi=mysqli_query($koneksi,"SELECT * FROM tabel_transaksi");
?>

<html lang="en">
<head>
    <title>Dasboard - Admin</title>
</head>
<body>
    <a href="tambah_makanan.php">Tambah Makanan.</a></br>
    <table width='70%' border=1>

    <tr>
        <th>id</th> <th>nama</th> <th>decs</th> <th>id_cate</th> <th>harga</th> <th>stok</th> <th>availability</th> <th>Update</th>
    </tr>
    <?php
    while($data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$data['id_makanan']."</td>";
        echo "<td>".$data['nama']."</td>";
        echo "<td>".$data['decs']."</td>";
        echo "<td>".$data['id_category']."</td>";
        echo "<td>".$data['harga']."</td>";
        echo "<td>".$data['stok']."</td>";
        echo "<td>".$data['avail']."</td>";
        echo "<td><a href='edit_makanan.php?id=$data[id_makanan]'>Edit</a> | <a href='delete_makanan.php?id=$data[id_makanan]'>Delete</a></td></tr>";
    }
    ?>
    </table>
    <br/>
    <table width="70%" border=2>
        <tr>
            <th>id_transaksi</th><th>id_pembeli</th><th>id_makanan</th><th>tanggal_beli</th><th>jumlah</th><th>total</th><th>status</th><th>edit</th>
        </tr>
        <?php
        while($data_transaksi=mysqli_fetch_array($transaksi)){
            $id_makanan=$data_transaksi['id_makanan'];
            $id_pengguna=$data_transaksi['id_akun'];
            $result= mysqli_query($koneksi,"SELECT * FROM tabel_makanan WHERE id_makanan=$id_makanan");
            $pengguna= mysqli_query($koneksi,"SELECT * FROM user_kantin WHERE id=$id_pengguna");

            $data_pengguna=mysqli_fetch_array($pengguna);
            $data_makanan=mysqli_fetch_array($result);
            $total_harga=$data_transaksi['jumlah']*$data_makanan['harga'];

            echo "<tr>";
            echo "<td>".$data_transaksi['id_transaksi']."</td>";
            echo "<td>".$data_pengguna['username']."</td>";
            echo "<td>".$data_makanan['nama']."</td>";
            echo "<td>".$data_transaksi['tanggal_beli']."</td>";
            echo "<td>".$data_transaksi['jumlah']."</td>";
            echo "<td>Rp.".$total_harga."</td>";
            echo "<td>".$data_transaksi['status']."</td>";
            echo "<td><a href='edit_transaksi.php?id=$data_transaksi[id_transaksi]'>Edit</td>";
            echo "</tr>";
        }

        ?>
    </table>
</body>
</html>