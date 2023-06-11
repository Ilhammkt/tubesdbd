<!DOCTYPE html>
<html>

<head>
    <title>Kantin Kuy!</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    body {
        background-image: url(css/bglogreg.svg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <img src="css/enak2.png" class="image6">
    <div>
        <div class="font">
            <h3>
                <?php
                echo '<span class="text-white">' . "Daftar" . '</span> <span class="warna2">' . "Kantin Kuy!" . '</span>';
                ?>
            </h3>
        </div>
        <form class="form-container" action="register.php" method="POST">
            <label for="username">Nama Pengguna :</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Kata Sandi :</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Register">
        </form>
    </div>

    <div class="register-container">
        <p>
            Sudah punya akun? <a href="login.php" class="text-white">Masuk ke Kantin Kuy!</a>
        </p>
    </div>

    <div class="line"></div>

    <?php
    require_once 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mendapatkan data dari form register
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Mengecek apakah ada nama pengguna yang sama, jika sudah ada nama pengguna regristrasi gagal, jika blum ada berhasil
        $queryExist = mysqli_query($koneksi, "SELECT username FROM user_kantin WHERE username='$username'");
        $jumlahDataBaru = mysqli_num_rows($queryExist);

        if ($jumlahDataBaru > 0) {
            ?>
            <div class="alert alert-warning col-2 mt-3 ms-3" role="alert">
                Nama Pengguna Sudah Terdaftar.
            </div>
            <?php
        } else {
            // Query untuk menyimpan data pengguna ke dalam database
            $query = "INSERT INTO user_kantin (username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($koneksi, $query);

            // Memeriksa hasil query
            if ($result) {
                // Data pengguna berhasil disimpan, tampilkan pesan sukses
                ?>
                <div class="alert alert-success col-3 mt-3 ms-3" role="alert">
                    Pendaftaran berhasil. silahkan <a href="login.php" class="alert-link">Masuk ke Kantin Kuy!</a>
                </div>
                <?php
            } else {
                // Terjadi kesalahan saat menyimpan data, tampilkan pesan error
                echo "Registrasi gagal";
            }
        }
    }
    ?>
</body>

</html>