<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "learn-backend";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("koneksi gagal");
}