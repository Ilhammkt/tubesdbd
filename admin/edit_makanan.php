<?php
// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama = $_POST['name'];
    $decs = $_POST['decs'];
    $id_cate = $_POST['id_cate'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $avail = $_POST['avail'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE tabel_makanan SET nama='$nama',decs='$decs',id_category='$id_cate',harga='$harga',stok='$stok',avail='$avail' WHERE id_makanan=$id");

    // Redirect to homepage to display updated user in list
    header("Location: dashboard_admin.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM tabel_makanan WHERE id_makanan=$id");

while($data = mysqli_fetch_array($result))
{
    $nama = $data['nama'];
    $decs = $data['decs'];
    $id_cate = $data['id_category'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $avail = $data['avail'];
}
?>
<html>
<head>
    <title>Edit info Makanan</title>
</head>

<body>
    <a href="dashboard_admin.php">Home</a>
    <br/><br/>

    <form name="update_makanan" method="post" action="edit_makanan.php">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name" value=<?php echo $nama;?>></td>
            </tr>
            <tr>
                <td>deskripsi</td>
                <td><input type="text" name="decs" value=<?php echo $decs;?>></td>
            </tr>
            <tr>
                <td>id kategori</td>
                <td><input type="text" name="id_cate" value=<?php echo $id_cate;?>></td>
            </tr>
            <tr>
                <td>harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td>stok</td>
                <td><input type="text" name="stok" value=<?php echo $stok;?>></td>
            </tr>
            <tr>
                <td>ketersediaan</td>
                <td><input type="radio" name="avail" value='ready'>Ready</td>
                <td><input type="radio" name="avail" value='not_ready'>Not Available</td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
