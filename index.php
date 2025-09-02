<?php

session_start();

if(isset($_SESSION['is_login'])) {
  if($_SESSION['role'] == 'admin') {
    header('location: dashboard_admin.php');
    exit;
  } elseif($_SESSION['role'] == 'user') {
    header('location: dashboard.php');
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fullstack Experiment</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="public/favicon.ico">
  </head>
  <body class="bg-gradient-to-l from-[#8DBCC7] to-[#A4CCD9]">
    <?php include_once "layouts/header.php" ?>

    <main class="min-h-screen flex justify-between items-center px-40">
      <div class="max-w-2xl">
        <h3 class="text-2xl font-bold text-black">Selamat datang pada website Backend Fundamental</h3>
        <h6 class="text-xl font-semibold text-slate-600">Jodi Jonatan | 2025</h6>
        <p class="text-slate-950">Website ini hanya dibuat untuk belajar backend development saja, dibuat dengan PHP, TailwindCSS, html dan MySQL. Website ini dibuat untuk belajar berinteraksi antara frontend dengan backend dan database</p>
      </div>
      <img src="./assets/home.jpg" alt="image" class="size-80 rounded-4xl">
    </main>

    <?php include_once "layouts/footer.html" ?>
  </body>
</html>
