<?php

session_start();

include "service/connection.php";

$message = "";

if(isset($_SESSION['is_login'])) {
  header('location: dashboard.php');
  exit;
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = hash("sha256", $_POST['password']);

    if ($username && $password) {
        $login = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection, $login);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            $_SESSION['username'] = $data['username'];
            $_SESSION['is_login'] = true;
            header("location: dashboard.php");
            exit;
        } else {
            $pesan = "akun tidak ditemukan";
        }
    } else {
        $pesan = "isikan data yang valid";
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
  </head>
  <body class="bg-gradient-to-l from-[#8DBCC7] to-[#A4CCD9]">
    <?php include_once "layouts/header.html" ?>

    <main class="min-h-screen flex items-center justify-center">
      <h1><?php if(isset($pesan)) echo $pesan ?></h1>
      <form action="login.php" method="POST" class="bg-slate-200 px-16 py-10 rounded-4xl">
        <h3 class="text-2xl font-bold text-center">Silahkan login sekarang</h3>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="w-full bg-white rounded-full px-4 py-2">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="w-full bg-white rounded-full px-4 py-2">
        </div>
        <input type="submit" name="login" value="Masuk" class="bg-sky-300 px-4 py-2 rounded-full mt-8 cursor-pointer hover:bg-sky-400">
      </form>
    </main>

    <?php include_once "layouts/footer.html" ?>
  </body>
</html>
