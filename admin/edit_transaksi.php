<?php
// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id_transaksi = $_POST['id_transaksi'];
    $id_akun = $_POST['id_akun'];
    $id_makanan = $_POST['id_makanan'];
    $tanggal_beli = $_POST['tanggal_beli'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE tabel_transaksi SET id_akun='$id_akun',id_makanan='$id_makanan',tanggal_beli='$tanggal_beli',jumlah='$jumlah',status='$status' WHERE id_transaksi=$id_transaksi");

    // Redirect to homepage to display updated user in list
    header("Location: dashboard_admin.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM tabel_transaksi WHERE id_transaksi=$id");

while($data = mysqli_fetch_array($result))
{
    $id_transaksi = $data['id_transaksi'];
    $id_akun = $data['id_akun'];
    $id_makanan = $data['id_makanan'];
    $tanggal_beli = $data['tanggal_beli'];
    $jumlah = $data['jumlah'];
    $status = $data['status'];
}
?>
<html>
<head>
    <title>Edit info Makanan</title>
</head>

<body>
    <a href="dashboard_admin.php">Home</a>
    <br/><br/>

    <form name="update transaski" method="post" action="edit_transaksi.php">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><?php echo $id_transaksi;?></td>
                <td><input type="hidden" name="id_transaksi" value=<?php echo $id_transaksi;?>></td>
            </tr>
            <tr>
                <td>id pembeli</td>
                <td><?php echo $id_akun;?></td>
                <td><input type="hidden" name="id_akun" value=<?php echo $id_akun;?>></td>
            </tr>
            <tr>
                <td>id makanan</td>
                <td><?php echo $id_makanan;?></td>
                <td><input type="hidden" name="id_makanan" value=<?php echo $id_makanan;?>></td>
            </tr>
            <tr>
                <td>tanggal</td>
                <td><?php echo $tanggal_beli;?></td>
                <td><input type="hidden" name="tanggal_beli" value=<?php echo $tanggal_beli;?>></td>
            </tr>
            <tr>
                <td>jumlah</td>
                <td><?php echo $jumlah;?></td>
                <td><input type="hidden" name="jumlah" value=<?php echo $jumlah;?>></td>
            </tr>
            <tr>
                <td>status</td>
                <td><input type="radio" name="status" value='process'>process</td>
                <td><input type="radio" name="status" value='delivering'>delivering</td>
                <td><input type="radio" name="status" value='delivered'>delivered</td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
