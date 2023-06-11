<!DOCTYPE html>
<html>

<head>
    <title>Kantin Kuy!</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<style>
    body {
        background-image: url(css/bglogreg.svg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <img src="css/enak3.png" class="image6">
    <div>
        <div class="font">
            <h2>
                <?php
                echo '<span class="text-white">' . "Masuk ke" . '</span> <span class="warna2">' . "Kantin Kuy!" . '</span>';
                ?>
            </h2>
        </div>
        <form class="form-container" action="#" method="POST">
            <label for="username">Nama Pengguna :</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Kata Sandi :</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>

    <div class="login-container">
        <p>
            Tidak punya akun? <a href="register.php" class="text-white">Mendaftar ke Kantin Kuy!</a>
        </p>
    </div>

    <div class="line"></div>

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
        if ($user_data = mysqli_fetch_array($result) /*mysqli_num_rows($result) > 0*/) {
            // Data pengguna ditemukan, set session dan redirect ke halaman 
            if (strcmp($user_data['type'],"admin") == 0) {
                $_SESSION['username'] = $user_data['username'];
                $_SESSION['id'] = $user_data['id'];
                header('Location: admin/halamanadmin.php');
            }
            else {
                $_SESSION['username'] = $user_data['username'];
                $_SESSION['id'] = $user_data['id'];
                header('Location: user/halamanuser.php');
            }

        } else {
            ?>
            <div class="alert alert-warning col-2 mt-3 ms-3" role="alert">
                Nama Pengguna atau Kata Sandi salah.
            </div>
            <?php
        }
    }
    ?>
</body>

</html>