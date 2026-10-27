<?php 
require __DIR__ . "/includes/proteksi.php"; 
require __DIR__ . "/../api/lib/json_store.php"; 
 
$pathPengguna = __DIR__ . "/../data/pengguna.json"; 
$pesan = ""; 
 
if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $nama     = trim($_POST["nama"]); 
    $username = trim($_POST["username"]); 
    $sandi    = $_POST["sandi"]; 
 
    $data = bukaJsonTerkunci($pathPengguna, $handle); 
 
    // Basis data punya UNIQUE untuk mencegah username kembar secara otomatis. 
    // Di sini (Flat-File), PEMERIKSAAN ITU HARUS DILAKUKAN SENDIRI (MANUAL) sebelum menulis. 
    $sudahAda = false; 
    foreach ($data as $p) { 
        if ($p["username"] === $username) { 
            $sudahAda = true; 
            break; 
        } 
    } 
 
    if ($sudahAda) { 
        $pesan = "Username sudah dipakai, pilih yang lain."; 
        tutupJsonTerkunci($handle, $data);   // lepas kunci TANPA mengubah apa pun 
    } else { 
        $idBaru = 1; 
        foreach ($data as $p) { 
            if ($p["id"] >= $idBaru) $idBaru = $p["id"] + 1; 
        } 
        $data[] = [ 
            "id"         => $idBaru, 
            "nama"       => $nama, 
            "username"   => $username, 
            "kata_sandi" => password_hash($sandi, PASSWORD_DEFAULT), 
        ]; 
        tutupJsonTerkunci($handle, $data); 
        $pesan = "Admin baru berhasil ditambahkan."; 
    } 
} 
 
// Sengaja TIDAK mengambil kolom kata_sandi sama sekali untuk ditampilkan. 
// Perubahan (Reset) Password WAJIB ditangani dengan METODE tersendiri, 
// namun belum/tidak dilatihkan pada kelas Junior Web Developer. 
 
$daftarAdmin = array_map(function ($p) { 
    return ["id" => $p["id"], "nama" => $p["nama"], "username" => $p["username"]]; 
}, bacaJson($pathPengguna)); 
?> 
<!DOCTYPE html> 
<html lang="id"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>Kelola Pengguna - Admin Kopi Nusantara</title> 
  <link rel="stylesheet" href="css/admin.css"> 
</head> 
<body> 
  <header class="admin-header"> 
    <h1>Kelola Pengguna</h1> 
    <p>Halo, <?= htmlspecialchars($_SESSION["admin_nama"]) ?> &middot; <a 
href="logout.php">Keluar</a></p> 
  </header> 
  <nav class="admin-menu"> 
    <a href="dashboard.php">Beranda</a> 
    <a href="produk.php">Produk</a> 
    <a href="pengguna.php" class="active">Pengguna</a> 
    <a href="transaksi.php">Transaksi</a> 
  </nav> 
 
  <main class="admin-content"> 
    <?php if ($pesan): ?><p class="status"><?= htmlspecialchars($pesan) ?></p><?php endif; ?> 
 
    <h2>Tambah Admin Baru</h2> 
    <form method="post" class="form-admin"> 
      <label>Nama <input type="text" name="nama" required></label> 
      <label>Username <input type="text" name="username" required></label> 
      <label>Kata Sandi <input type="password" name="sandi" required minlength="8"></label> 
      <button type="submit" class="btn">Tambah</button> 
    </form> 
 
    <h2>Daftar Admin</h2> 
    <table class="tabel-admin"> 
      <thead><tr><th>Nama</th><th>Username</th></tr></thead> 
      <tbody> 
        <?php foreach ($daftarAdmin as $a): ?> 
          <tr> 
            <td><?= htmlspecialchars($a["nama"]) ?></td> 
            <td><?= htmlspecialchars($a["username"]) ?></td> 
          </tr> 
        <?php endforeach; ?> 
      </tbody> 
    </table> 
  </main> 
</body> 
</html>