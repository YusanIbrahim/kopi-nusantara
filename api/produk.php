<?php
// Latihan 2: no 4

require __DIR__ . "/lib/json_store.php";    // Sesuaikan path

header("Content-Type: application/json");   // Set header agar browser tahu ini JSON

$data = bukaJsonTerkunci(__DIR__ . "/../data/produk.json", $handle);     // Sesuaikan path


echo json_encode($data);  // Kembalikan data produk dalam format JSON
?>