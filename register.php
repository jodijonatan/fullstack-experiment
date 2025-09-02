<?php

session_start();

include_once "service/connection.php";

$pesan = "";

if(isset($_SESSION['is_login'])) {
  header('location: dashboard.php');
  exit;
}

if (isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash("sha256", $_POST['password']);

    try {
      if ($username && $email && $password) {
        $register = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($connection, $register);
        $pesan = "Data berhasil dikirim, silahkan masuk";
      } else {
        $pesan = "Masukkan data yang valid";
      }
    } catch (mysqli_sql_exception) {
      $pesan = "input tidak valid, silahkan coba lagi";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Learn Backend</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="public/favicon.ico">
  </head>
  <body class="bg-gradient-to-l from-[#8DBCC7] to-[#A4CCD9]">
    <?php include_once "layouts/header.php" ?>

    <main class="min-h-screen flex justify-center items-center">
      <form action="register.php" method="POST" class="bg-slate-200 px-16 py-10 rounded-4xl">
        <h3 class="text-2xl font-bold text-center">Silahkan register sekarang</h3>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="w-full bg-white rounded-full px-4 py-2">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="w-full bg-white rounded-full px-4 py-2">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="w-full bg-white rounded-full px-4 py-2">
        </div>
        <input type="submit" name="register" value="Daftar" class="bg-sky-300 px-4 py-2 rounded-full mt-8 cursor-pointer hover:bg-sky-400">
      </form>
      <?php if($pesan) { ?>
        <h3><?= $pesan ?></h3>
      <?php } ?>
    </main>

    <?php include_once "layouts/footer.html" ?>
  </body>
</html>
