<?php
// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $id_akun = $_POST['id_akun'];
    $id_menu = $_POST['id_menu'];
    $tanggal_beli = $_POST['tanggal_beli'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE tabel_transaksi SET id_akun='$id_akun',id_menu='$id_menu',tanggal_beli='$tanggal_beli',jumlah='$jumlah',status='$status' WHERE id_transaksi=$id_transaksi");

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

while ($data = mysqli_fetch_array($result)) {
    $id_transaksi = $data['id_transaksi'];
    $id_akun = $data['id_akun'];
    $id_menu = $data['id_menu'];
    $tanggal_beli = $data['tanggal_beli'];
    $jumlah = $data['jumlah'];
    $status = $data['status'];
}
?>
<html>

<head>
    <title>Edit info menu</title>
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
        <div class="table-responsive">
            <form class="position-absolute top-50 start-50 translate-middle" name="update transaski" method="post"
                action="edit_transaksi.php">
                <h2 class="warna2">EDIT TRANSAKSI KANTIN KUY!</h2>
                <table class="table table-hover table-light col-2">
                    <tr>
                        <td class="table-success warna3">Nama</td>
                        <td>
                            <?php echo $id_transaksi; ?>
                        </td>
                        <td><input type="hidden" name="id_transaksi" value=<?php echo $id_transaksi; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">id pembeli</td>
                        <td>
                            <?php echo $id_akun; ?>
                        </td>
                        <td><input type="hidden" name="id_akun" value=<?php echo $id_akun; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">id menu</td>
                        <td>
                            <?php echo $id_menu; ?>
                        </td>
                        <td><input type="hidden" name="id_menu" value=<?php echo $id_menu; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">tanggal</td>
                        <td>
                            <?php echo $tanggal_beli; ?>
                        </td>
                        <td><input type="hidden" name="tanggal_beli" value=<?php echo $tanggal_beli; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">jumlah</td>
                        <td>
                            <?php echo $jumlah; ?>
                        </td>
                        <td><input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>></td>
                    </tr>
                    <tr>
                        <td class="table-success warna3">status</td>
                        <td><input type="radio" name="status" value='process'>process <input class="ms-3" type="radio"
                                name="status" value='delivering'>delivering<input class="ms-3" type="radio"
                                name="status" value='delivered'>delivered</td>
                    </tr>
                    <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                </table>
                <div class="mt-2">
                    <button type="submite" class="btn btn-success" name="update">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>