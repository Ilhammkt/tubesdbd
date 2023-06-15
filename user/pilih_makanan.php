<!DOCTYPE html>
<?php
include_once('../config.php');
session_start();
$result=mysqli_query($koneksi,'SELECT * FROM tabel_makanan WHERE avail!="not_ready"');
$result_kategori=mysqli_query($koneksi,"SELECT * FROM tabel_kategori");
$kategori=mysqli_fetch_array($result_kategori);
?>

<html>
    <head>
        <title>pilih makanan</title>
    </head>
    <body>
        <a href="dashboard_user.php">Kembali.</a></br>
        <table width='80%' border=2>
        <tr>
            <th>nama</th> <th>deskripsi</th> <th>jenis</th> <th>harga</th> <th><a href="checkout.php">Checkout kuy.</a></th>
        </tr>
        <?php
        
        while($data = mysqli_fetch_array($result)) {
            $kate=$data['id_category'];
            echo "<tr>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$kategori[$kate]."</td>";
            echo "<td>".$data['decs']."</td>";
            echo "<td>".$data['harga']."</td>";
            echo "<td><a href='jumlah.php?id=$data[id_makanan]'>pilih</a>";
        }
        ?>
        </tr>
        </table>
    </body>
</html>