<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <?php
    session_start();
    if($_SESSION['level']=="") {
        header("Location:login.php?pesan=gagal");
    }
    ?>
    <h1>Halaman Admin</h1>

    <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai Admin <b><?php echo $_SESSION['level']; ?> </b>.</p>
    <a href="logout.php">Logout</a>

</body>
</html>