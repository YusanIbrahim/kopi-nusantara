<?php 
session_start(); 
require __DIR__ . "/../api/lib/json_store.php"; 
 
$pesanGalat = ""; 
 
if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $username = trim($_POST["username"] ?? ""); 
    $sandi    = $_POST["sandi"] ?? ""; 
 
    $dataPengguna = bacaJson(__DIR__ . "/../data/pengguna.json"); 
 
    $admin = null; 
    foreach ($dataPengguna as $p) { 
        if ($p["username"] === $username) { 
            $admin = $p; 
            break; 
        } 
    } 
 
    if ($admin && password_verify($sandi, $admin["kata_sandi"])) { 
        $_SESSION["admin_id"]   = $admin["id"]; 
        $_SESSION["admin_nama"] = $admin["nama"]; 
        header("Location: dashboard.php"); 
        exit; 
    } 
 
    $pesanGalat = "Username atau kata sandi salah."; 
} 
?> 
<!DOCTYPE html> 
<html lang="id"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>Login Admin - Kopi Nusantara</title> 
  <link rel="stylesheet" href="css/admin.css"> 
</head> 
<body class="halaman-login"> 
  <form method="post" class="form-login"> 
    <h1>Login Admin</h1> 
    <?php if ($pesanGalat): ?> 
      <p class="pesan-galat"><?= htmlspecialchars($pesanGalat) ?></p> 
    <?php endif; ?> 
    <label>Username <input type="text" name="username" required autofocus></label> 
    <label>Kata Sandi <input type="password" name="sandi" required></label> 
    <button type="submit" class="btn">Masuk</button> 
  </form> 
</body> 
</html>