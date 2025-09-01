<?php

session_start();
if(isset($_POST['logout'])) {
    session_destroy();

    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Backend</title>
</head>
<body>
    <?php include_once 'layouts/header.html' ?>

    <main>
        <h1>Selamat datang di dashboard, <?= $_SESSION['username'] ?></h1>
        <form action="dashboard.php" method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>
    </main>

    <?php include_once 'layouts/footer.html' ?>
</body>
</html>