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


#MASALAAH YANG SAYA DAPAT

-TIDAK BISA MENGHAPUS RIWAT KERANJANG BELANJA
-TOMBOL (+) DAN (-) TIDAK BERFUNGSI