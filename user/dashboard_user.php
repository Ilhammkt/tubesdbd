<!DOCTYPE html>
<html>
<?php
include_once('../config.php');
session_start();
$username = $_SESSION['username'];
?>

<head>
    <title>Kantin Kuy!</title>
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <style>
        #menu {
            scroll-margin-top: 900px;
            /* Menyesuaikan jarak gulir ke elemen menu */
        }
    </style>
</head>


<body>

    <div class="konten">
        <a class="shape"></a>
        <a class="shape1"></a>
        <a class="shape2"></a>
        <a class="shape3"></a>
        <img src="../css/gambarawal.svg" class="image7">

        <div class="title">
            <h6>
                <?php
                echo '<span class="warna">' . "Hallo,  " . '</span>' . $username;
                ?>
            </h6>
            <h3>Makan &</h3>
            <h4>Minum dengan</h4>
            <h5>Cita Rasa Bintang Lima</h5>

        </div>
        <img class="logo" src="../css/logo.png"></li>
        <div class="navbar">
            <ul>
                <li><a href="dashboard_user.php">Beranda</a></li>
                <li><a href='pilih_menu.php'>Menu</a></li>
                <li><a href='transaksi_user.php'>Transaski</a></li>
                <li><a href="../login.php"><button type="button" class="btn btn-outline-danger">Keluar</button></a></li>
            </ul>
        </div>

    </div>
</body>

</html>