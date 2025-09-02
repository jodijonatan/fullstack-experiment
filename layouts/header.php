<header class="bg-white flex justify-between px-8 h-16 items-center">
  <h2 class="font-bold text-2xl text-sky-800">Fullstack Experiment</h2>
  <ul class="flex text-lg font-semibold">
    <li><a class="ml-8 hover:underline hover:text-sky-800" href="index.php">Home</a></li>
    <?php if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] == false) { ?>
      <li><a class="ml-8 hover:underline hover:text-sky-800" href="login.php">Login</a></li>
      <li><a class="ml-8 hover:underline hover:text-sky-800" href="register.php">Register</a></li>
    <?php } ?>
    <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) { ?>
      <form class="ml-8 hover:underline hover:text-sky-800" action="dashboard.php" method="POST">
        <input type="submit" name="logout" value="Logout" class="cursor-pointer">
      </form>
    <?php } ?>
  </ul>
</header>