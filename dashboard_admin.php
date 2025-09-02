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
    <title>Fullstack Experiment</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="public/favicon.ico">
</head>
<body class="bg-gradient-to-l from-[#8DBCC7] to-[#A4CCD9]">
    <?php include_once 'layouts/header.php' ?>

    <main class="min-h-screen flex justify-between items-center px-40">
        <div>
            <h1 class="text-2xl font-bold text-black">Selamat datang di dashboard admin, <span class="text-sky-800"><?= $_SESSION['username'] ?></span></h1>
        </div>
        <img src="assets/dashboard_admin.jpg" alt="image" class="size-80 rounded-4xl">
    </main>

    <?php include_once 'layouts/footer.html' ?>
</body>
</html>