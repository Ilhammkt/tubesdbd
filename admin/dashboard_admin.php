<!DOCTYPE html>

<?php
include_once('../config.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Kuy!</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body class="container">
    <header>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h2> <img src="C:\xampp\htdocs\phpdasar\tubesdbd\admin\logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    BANGGGG PUSINGGG BANG admin ini</h2>
                    <?php
                    session_start();
                    print_r($_SESSION);
                    ?>
                </a>
             </div>
        </nav>
    </header>
    <main></main>
    <footer></footer>
</body>
</html>