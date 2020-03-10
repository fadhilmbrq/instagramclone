<?php

session_start();
include "koneksi.php";

$username = $_POST["username"];
$name = $_POST["name"];
$email = $_POST["email"];
$website = $_POST["website"];
$gender = $_POST["password"];
$bio = $_POST["bio"];
$phone = $_POST["phone"];

mysqli_query($conn, "update user set username = '$username', email = '$email' where id = " . $_SESSION["user"]["user_id"]);
mysqli_query($conn, "update profile set name = '$name', bio = '$bio', website = '$website', phone = '$phone', gender = '$gender' where user_id = " . $_SESSION["user"]["user_id"]);

$login = mysqli_query($conn, "select * from user join profile on user.id = profile.user_id where user_id = " . $_SESSION["user"]["user_id"]);
$_SESSION["user"] = mysqli_fetch_assoc($login);

header("Location: profile.php");
