<!DOCTYPE html>
<html>

<head>
    <title>Kantin Kuy!</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    body {
        background-image: url(css/bg2.svg);
        /* Ganti dengan jalur/gambar yang sesuai */
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <img src="css/enak3.png" class="image6">
    <div class="form-container">
        <h2 class="font">
            <?php
            echo '<span class="warna1">' . "Masuk ke" . '</span> <span class="warna2">' . "Kantin Kuy!" . '</span>';
            ?>
        </h2>
        <form action="#" method="POST">
            <label for="username">Nama Pengguna/Email :</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Kata Sandi :</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>

    <div class="register-container">
        <p class="reg">
            Tidak punya akun? <a href="register.php" class="warna1">Mendaftar ke Kantin Kuy!</a>
        </p>
    </div>

    <div class="shape"></div>

    <?php
    session_start();
    require_once 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query untuk memeriksa data pengguna dalam database
        $query = "SELECT * FROM user_kantin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($koneksi, $query);

        // Memeriksa hasil query
        if (mysqli_num_rows($result) > 0) {
            // Data pengguna ditemukan, set session dan redirect ke halaman lain
            $_SESSION['username'] = $username;
            header('Location: admin/halaman.php');

            
        } else {
            // Login gagal
            echo "<p>Login gagal</p>";
        }
    }
    ?>
</body>

</html>