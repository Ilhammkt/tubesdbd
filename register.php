<!DOCTYPE html>
<html>

<head>
    <title>Kantin Kuy!</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    body {
        background-image: url(css/bglogreg.svg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <div class="navbar">
        <ul>
            <li><img class="logo" src="css/logo.png"></li>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="#">Tentang</a></li>
            <li><a href="#">Produk</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
    </div>
    <img src="css/enak2.png" class="image6">
    <div class="form-container">
        <h2 class="font">
            <?php
            echo '<span class="warna1">' . "Daftar" . '</span> <span class="warna2">' . "Kantin Kuy!" . '</span>';
            ?>
        </h2>
        <form action="register.php" method="POST">
            <label for="username">Nama Pengguna/Email :</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Kata Sandi :</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Register">
        </form>
    </div>

    <?php
    require_once 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mendapatkan data dari form register
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query untuk menyimpan data pengguna ke dalam database
        $query = "INSERT INTO user_kantin (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($koneksi, $query);

        // Memeriksa hasil query
        if ($result) {
            // Data pengguna berhasil disimpan, tampilkan pesan sukses
            echo "Registrasi berhasil. Silakan login dengan akun yang telah dibuat.";
            // sleep jeda
            sleep(5);
            // Redirect ke halaman login.php
            header("Location: login.php");
            exit();

        } else {
            // Terjadi kesalahan saat menyimpan data, tampilkan pesan error
            echo "Registrasi gagal";
        }
    }
    ?>
</body>

</html>