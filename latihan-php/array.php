<?php

$produk = [
    ["slug"     => "kopi-arabika-gayo",
    "nama"     => "Kopi Arabika Gayo",
    "harga"    => 85000,
    "kategori" => "robusta"],
    ["slug"     => "kopi-bajawa",
    "nama"     => "Kopi bajawa Gayo",
    "harga"    => 75000,
    "kategori" => "robusta"

    ]
];

echo "Nama       : {$produk[0]    ['nama']}\n ";
echo "Harga      : {$produk[0]    ['harga']}\n ";
echo "nama kedua : {$produk[1]    ['nama']}";
?>