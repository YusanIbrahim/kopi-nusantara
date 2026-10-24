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