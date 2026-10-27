# Kopi Nusantara
Halaman web statis toko biji. di buat modul kerja 1, 
pelatihan junior web developer, UPTD BLK Provinsi Gorontalo, Batch #5.

##Struktur Folder 
-`index.html`: halaman utama
-`css/style.css` : gaya tampilan 
-`img/ : gambar dan logo

## cara menjalankan
1. salin folder proyek ke dalam folder `www` laragon.
2. jalankan laragon (Start ALL).
3. buka `http://localhost/kopi-nusantara/` di browser.

## penulis

Yusan Ibrahim

### BUG : H16 -B01

- TOMBOL (+) DAN (-) TIDAK BERFUNGSI
- TOMBOL MENGHAPUS RIWAT DI KERANJANG BELANJA JUGA TIDAK BERFUNGSI


#bug 01 di index.html
bug =
<button id="tombol-keranjang-header" class="cart-icon" onclick="location.hash='#keranjang'">
                🛒 <span id="badge-keranjang" class="badge" hidden>0</span>
        </button>
fix =
<button id="tombol-keranjang-header" class="cart-icon" onclick="window.location.href='#keranjang'">
    🛒 <span id="badge-keranjang" class="badge" hidden>0</span>
</button>


### MASALAAH YANG SAYA DAPAT 

-Tidak bisa menghapus riwayat (tombol hapus tidak tampil & berfungsi )
-TOMBOL (+) DAN (-) TIDAK BERFUNGSI
-ukuran gambar produk tidak samaa


### bug 17

- tombol chekout blm berfungsi 
- ada tulisan tidak terhubung ke server

### ini console h17
5keranjang.js:277 SyntaxError: Unexpected token '<', "<br />
<b>"... is not valid JSON
(anonymous) @ keranjang.js:277
## H17 - Kegiatan Belajar 5F.2: Endpoint Checkout dan Penguncian Berkas
**1. BUG-01**
FrontEnd: Tidak dapat terhubung ke server.
DevTools-Console Error: 
```
keranjang.js:147  POST http://kopi-nusantara.test/api/checkout.php 400 (Bad Request)
(anonymous) @ keranjang.js:147

keranjang.js:164 SyntaxError: Unexpected token '<', "<br />
<b>"... is not valid JSON (at VM339:1:1)
(anonymous) @ keranjang.js:164
```
**BUG-FIXED:**
Di produk.json -> cek apakah sudah diisi:
Array produk -> key & value "stok: 20"

**2. BUG-02**
Jam di `transaksi.json` -> item transaksi `dibuat_pada: tidak sesuai` 😇
_Otomatis akan berpengaruh (legacy-bug) pada H18 - Modul-5F.3: Struk PDF dengan FPDF_

**BUG-FIXED:**
1. Buka file `php.ini` di Laragon
2. Cari `date.timezone`
3. Hilangkan semicolon (komen `;` di depannya)
4. isi dengan `date.timezone = Asia/Makassar`

_Catatan: Sesuaikan Wilayah Waktu Anda_

**Pengembangan**
- `Isi KERANJANG`, tidak otomatis tampil / `no-autoreload` (kecuali F5).
- `Lihat Struk` dan `Unduh Struk`, belum berfungsi.

## H18 - Kegiatan Belajar Modul 5F.3: Composer dan FPDF — Struk PDF
**Fitur**
- Penerapan PATCH-01 `autoreload.js` | `patch/01-patch-autoreload.js`
- [Lihat Struk](http://kopi-nusantara.test/api/struk.php?kode=KN-ECEA926A) Sudah berfungsi
- [Unduh Struk](http://kopi-nusantara.test/api/struk.php?kode=KN-ECEA926A&unduh=1) Sudah berfungsi

**BUG**
- H18-001: Aktifitas `Tambah Keranjang` setelah `Checkout` menyembunyikan `Form Checkout` dari `Keranjang Belanja`.

**BUG-FIXED**
- H18-001: Next H19...

**Pengembangan**
- Ubah ukuran kertas Struk agar sesuai dengan POS-Printer (Pelajari Manual FPDF).

### bug h21
terjadi bug ketika mengubah produk, smua datanya hilang 
### fix bug 
cdn di prodk php di hilangkann
