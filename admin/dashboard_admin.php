<!DOCTYPE html>

<?php
include_once('../config.php');
session_start();
$result= mysqli_query($koneksi,"SELECT * FROM tabel_makanan");
?>

<html lang="en">
<head>
    <title>Dasboard - Admin</title>
</head>
<body>
    <a href="tambah_makanan.php">Tambah Makanan.</a></br>
    <table width='70%' border=1>

    <tr>
        <th>id</th> <th>nama</th> <th>decs</th> <th>id_cate</th> <th>harga</th> <th>stok</th> <th>Update</th>
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
        echo "<td><a href='edit.php?id=$data[id_makanan]'>Edit</a> | <a href='delete.php?id=$data[id_makanan]'>Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>