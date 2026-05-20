<?php
$username = $_POST["username"];
$password = $_POST["password"];

if ($username == "admin" && $password == "admin") {
    echo "<h1>Login berhasil!</h1>";
    echo "<h1>Selamat datang, <font color='blue'>admin</font>.</h1>";
    echo "<a href='login.html'>kembali ke halaman login</a>";
} else {
    echo "<h1><font color='red'>Username : $username Tidak Terdaftar!</font></h1>";
    echo "<a href='login.html'>kembali ke halaman login</a>";
}
?>