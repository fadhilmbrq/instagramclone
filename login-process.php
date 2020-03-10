<?php

session_start();
include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$login = mysqli_query($conn, "select * from user join profile on user.id = profile.user_id where username = '$username' and password = '$password'");

if (mysqli_num_rows($login) > 0) {
    $_SESSION["user"] = mysqli_fetch_assoc($login);
    header("Location: feed.php");
} else {
    header("Location: index.php");
}
