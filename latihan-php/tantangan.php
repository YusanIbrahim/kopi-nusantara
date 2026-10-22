<?php

require __DIR__ . "/fungsi.php";

$produkList = [
    ["slug" => "kopi-arabika-gayo", "nama" => "Kopi Arabika Gayo", "harga" => 85000],
    ["slug" => "kopi-robusta-lampung", "nama" => "Kopi Robusta Lampung", "harga" => 65000],
    ["slug" => "kopi-toraja", "nama" => "Kopi Toraja", "harga" => 95000],
];

foreach ($produkList as $produk) {
    echo "{$produk['nama']} - " . formatRupiah($produk['harga']) . "\n";
}
?>