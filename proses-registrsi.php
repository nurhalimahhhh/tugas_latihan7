<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $username = $_POST["username"];
 $password = password_hash($_POST["password"], PASSWORD_BCRYPT); //
Hash password
 // Simpan data pengguna ke database
 // ...

 // Redirect ke halaman login
 header("Location: login.php");
 }
 ?>
