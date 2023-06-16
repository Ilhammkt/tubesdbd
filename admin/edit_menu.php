<?php
// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $decs = $_POST['decs'];
    $id_cate = $_POST['id_cate'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $avail = $_POST['avail'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE tabel_menu SET nama='$nama',decs='$decs',id_category='$id_cate',harga='$harga',stok='$stok',avail='$avail' WHERE id_menu=$id");

    // Redirect to homepage to display updated user in list
    header("Location: dashboard_admin.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM tabel_menu WHERE id_menu=$id");

while ($data = mysqli_fetch_array($result)) {
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
    <title>Edit Info Menu</title>
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
    <img class="logo" src="../css/logo.png"></li>
    <div class="navbar">
        <ul>
            <li><a href="dashboard_admin.php">Beranda</a></li>
            <li><a href='dashboard_admin.php'>Menu</a></li>
            <li><a href='transaksi.php'>Transaski</a></li>
            <li><a href="../login.php"><button type="button" class="btn btn-outline-danger">Keluar</button></a></li>
        </ul>
    </div>

    <div class="p-5">
        <div class="table-responsive col-5">
            <form class="position-absolute top-50 start-50 translate-middle" name="update_menu" method="post"
                action="edit_menu.php">
                <h2 class="warna2">EDIT MENU KANTIN KUY!</h2>
                <table class="table table-hover table-light">
                    <tr>
                        <td class="table-success warna3">Nama</td>
                        <td><input type="text" name="nama" value=<?php echo $nama; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">Deskripsi</td>
                        <td><input type="text" name="decs" value=<?php echo $decs; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">ID Kategori</td>
                        <td><input type="text" name="id_cate" value=<?php echo $id_cate; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">Harga</td>
                        <td><input type="text" name="harga" value=<?php echo $harga; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">Stok</td>
                        <td><input type="text" name="stok" value=<?php echo $stok; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">Ketersediaan</td>
                        <td><input type="radio" name="avail" value='ready'>Ready <input class="ms-3" type="radio"
                                name="avail" value='not_ready'>Not Available</td>
                    </tr>
                    <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                </table>

                <div class="mt-2">
                    <button type="submit" class="btn btn-success" name="update">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>