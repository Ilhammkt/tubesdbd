<!DOCTYPE html>
<html>
<?php
include_once('../config.php');
session_start();
$username=$_SESSION['username'];
?>

<head>
    <title>Kantin Kuy!</title>
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <style>
        #makanan {
            scroll-margin-top: 900px;
            /* Menyesuaikan jarak gulir ke elemen makanan */
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
        <div class="title" id="scrollberanda">
            <?php
            echo "<h3> Hallo ".$username."</h3>";
            ?>
            <h4>Minum dengan</h4>
            <h5>Cita Rasa Bintang Lima</h5>
            
        </div>
        <img class="logo" src="../css/logo.png"></li>
        <div class="navbar">
            <ul>
                <li><a href="#beranda">Beranda</a></li>
                <?php
                echo "<li><a href='pilih_makanan.php'>Makanan</a></li>"
                ?>
            </ul>
        </div>
        <div id="makanan">
            <h2>Daftar Menu Makanan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama Makanan</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nasi Goreng</td>
                        <td>Rp 25.000</td>
                        <td>Nasi yang digoreng dengan bumbu dan tambahan daging, sayuran, dan telur.</td>
                    </tr>
                    <tr>
                        <td>Mie Ayam</td>
                        <td>Rp 20.000</td>
                        <td>Mie dengan irisan daging ayam, sayuran, dan kuah kaldu.</td>
                    </tr>
                    <tr>
                        <td>Sate Ayam</td>
                        <td>Rp 15.000</td>
                        <td>Sate yang terbuat dari daging ayam yang dipanggang dan disajikan dengan bumbu kacang.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>