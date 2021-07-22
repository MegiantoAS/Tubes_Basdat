<?php
session_start();
include 'connection.php';

$username = addslashes($_POST['username']);
$password = md5($_POST['password']);

$result = mysqli_query($mysqli, "SELECT * FROM pegawai where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION["username"] = $data["username"];
    $_SESSION["nama"] = $data["nama"];
    header("location:dashboard.php");
} else {
    header("location:form_login.php?pesan=Gagal login data tidak ditemukan!");
}
