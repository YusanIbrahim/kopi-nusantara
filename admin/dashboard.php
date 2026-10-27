<?php 
require __DIR__ . "/includes/proteksi.php"; 
require __DIR__ . "/../api/lib/json_store.php"; 
 
$dataProduk    = bacaJson(__DIR__ . "/../data/produk.json"); 
$dataTransaksi = bacaJson(__DIR__ . "/../data/transaksi.json"); 
 
$jumlahProduk    = count($dataProduk["produk"]); 
$jumlahTransaksi = count($dataTransaksi); 
$totalPendapatan = array_sum(array_column($dataTransaksi, "total")); 
?> 
<!DOCTYPE html> 
<html lang="id"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>Dashboard Admin - Kopi Nusantara</title> 
  <link rel="stylesheet" href="css/admin.css"> 
</head> 
<body> 
  <header class="admin-header"> 
    <h1>Dashboard</h1> 
    <p>Halo, <?= htmlspecialchars($_SESSION["admin_nama"]) ?> &middot; <a 
href="logout.php">Keluar</a></p> 
  </header> 
 
  <nav class="admin-menu"> 
    <a href="dashboard.php" class="active">Beranda</a> 
    <a href="produk.php">Produk</a> 
    <a href="pengguna.php">Pengguna</a> 
    <a href="transaksi.php">Transaksi</a> 
  </nav> 
 
  <main class="admin-content"> 
    <div class="ringkasan"> 
      <div class="kartu-ringkasan"> 
        <p class="angka"><?= $jumlahProduk ?></p> 
        <p class="label">Produk</p> 
      </div> 
      <div class="kartu-ringkasan"> 
        <p class="angka"><?= $jumlahTransaksi ?></p> 
        <p class="label">Transaksi</p> 
      </div> 
      <div class="kartu-ringkasan"> 
        <p class="angka">Rp <?= number_format($totalPendapatan, 0, ",", ".") ?></p> 
        <p class="label">Total Pendapatan</p> 
      </div> 
    </div> 
  </main> 
</body> 
</html>