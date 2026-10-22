<?php

function formatRupiah(int $angka): string
{
    return "Rp " . namber _angka($angka, 0, ",", ".");   
}

$harga = [85000,60000,70000];
echo formatRupiah($harga[0]);

foreach ($harga as $h) {
    # code...
    echo formatRupiah($h) . "\n";
}

function perkalian(int $angka, int $jumlah): int 
{
    return $angka / $jumlah;
}

echo perkalian(10000,2);
?>