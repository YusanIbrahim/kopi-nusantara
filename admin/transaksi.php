<?php 
require __DIR__ . "/includes/proteksi.php"; 
require __DIR__ . "/../api/lib/json_store.php"; 
 
$dataTransaksi = bacaJson(__DIR__ . "/../data/transaksi.json"); 
 
// Urutkan dari yang terbaru -- pengganti "ORDER BY id DESC" 
usort($dataTransaksi, function ($a, $b) { 
    return $b["id"] <=> $a["id"]; 
}); 
?> 
<!DOCTYPE html> 
<html lang="id"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>Transaksi - Admin Kopi Nusantara</title> 
  <link rel="stylesheet" href="css/admin.css"> 
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@6/dist/style.css" rel="stylesheet"> 
</head> 
<body> 
  <header class="admin-header"> 
    <h1>Transaksi</h1> 
    <p>Halo, <?= htmlspecialchars($_SESSION["admin_nama"]) ?> &middot; <a 
href="logout.php">Keluar</a></p> 
  </header> 
  <nav class="admin-menu"> 
    <a href="dashboard.php">Beranda</a> 
    <a href="produk.php">Produk</a> 
    <a href="pengguna.php">Pengguna</a> 
    <a href="transaksi.php" class="active">Transaksi</a> 
  </nav> 
 
  <main class="admin-content"> 
    <table class="tabel-admin"> 
      <thead> 
        
<tr><th>Kode</th><th>Pemesan</th><th>Kontak</th><th>Total</th><th>Status</th><th>Tanggal</th></tr> 
      </thead> 
      <tbody> 
        <?php foreach ($dataTransaksi as $t): ?> 
          <tr> 
            <td><?= htmlspecialchars($t["kode_transaksi"]) ?></td> 
            <td><?= htmlspecialchars($t["nama_pemesan"]) ?></td> 
            <td><?= htmlspecialchars($t["kontak"]) ?></td> 
            <td>Rp <?= number_format($t["total"], 0, ",", ".") ?></td> 
            <td><?= htmlspecialchars($t["status"]) ?></td> 
            <td><?= $t["dibuat_pada"] ?></td> 
          </tr> 
        <?php endforeach; ?> 
      </tbody> 
    </table> 
  </main> 
 
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@6"></script> 
  <script src="js/admin.js"></script> 
</body> 
</html>