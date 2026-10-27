<?php
// Skrip SEKALI JALAN: membuat akun admin pertama.
// Jalankan sekali lewat browser, lalu SEGERA hapus atau ganti nama berkas ini.
require __DIR__ . "/../api/lib/json_store.php";
$path = __DIR__ . "/../data/pengguna.json";
$data = bukaJsonTerkunci($path, $handle);
$idBaru = 1;
foreach ($data as $p) {
 if ($p["id"] >= $idBaru) $idBaru = $p["id"] + 1;
}
$data[] = [
 "id" => $idBaru,
 "nama" => "Admin Kopi Nusantara",
 "username" => "admin",
 "kata_sandi" => password_hash("ganti-ini-123", PASSWORD_DEFAULT), // GANTI sebelum dipakai sungguhan
];
tutupJsonTerkunci($handle, $data);
echo "Admin pertama dibuat. Username: admin\n";
echo "SEGERA hapus atau ganti nama berkas ini setelah dijalankan.\n"; 