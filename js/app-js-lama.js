// app.js: logika tampilan. Data diambil dari data.js 
 
// ---------- Elemen yang dipakai ---------- 
const menuEl = document.getElementById("menu"); 
const filterEl = document.getElementById("filter-produk"); 
const jumlahEl = document.getElementById("jumlah-produk"); 
const daftarEl = document.getElementById("daftar-produk"); 
const formKontak = document.getElementById("form-kontak"); 
const statusEl = document.getElementById("form-status"); 
 
// ---------- State ---------- 
let filterKategori = "semua"; 
 
// ---------- Fungsi bantu ---------- 
function rupiah(angka) { 
  return "Rp " + angka.toLocaleString("id-ID");

  } 
 
// Mengubah karakter khusus menjadi aman (mencegah XSS) 
function esc(teks) { 
  return String(teks).replace(/[&<>"']/g, function (c) { 
    return { 
      "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;", 
    }[c]; 
  }); 
} 

// langkah b render menu

// ---------- Menu ---------- 
function renderMenu() { 
  menuEl.innerHTML = MENU.map(function (m) { 
    return `<li><a href="#${m.id}">${esc(m.label)}</a></li>`; 
  }).join(""); 
}

// langkah c render kartu produk

// ---------- Produk ---------- 
function kartuProduk(p) { 
  return ` 
    <article class="card"> 
      <img src="${esc(p.gambar)}" alt="${esc(p.nama)}" class="product-photo">
      <h3>${esc(p.nama)}</h3> 
      <p class="meta">${esc(p.asal)} &middot; ${esc(p.kategori)}</p> 
      <p>${esc(p.deskripsi)}</p> 
      <p class="price">${rupiah(p.harga)}</p> 
    </article> 
  `; 
} 
 
function renderProduk() { 
  const daftar = filterKategori === "semua" 
    ? PRODUCTS 
    : PRODUCTS.filter(function (p) { 
        return p.kategori === filterKategori; 
      }); 
 
  jumlahEl.textContent = "Menampilkan " + daftar.length + " produk"; 
  daftarEl.innerHTML = daftar.map(kartuProduk).join(""); 
}

// langkah d tombol filter

function renderFilter() { 
  const kategori = ["semua", "arabika", "robusta"]; 
  filterEl.innerHTML = kategori.map(function (k) { 
    const aktif = k === filterKategori ? "active" : ""; 
    return `<button class="filter ${aktif}" data-kategori="${k}">${k}</button>`; 
  }).join(""); 
} 
 
// Event delegation: listener dipasang pada induk yang tidak berubah 
filterEl.addEventListener("click", function (e) { 
  const tombol = e.target.closest("[data-kategori]"); 
  if (!tombol) return; 
 
  filterKategori = tombol.dataset.kategori; 
  renderFilter(); 
  renderProduk(); 
}); 

// langkah e validasi formulir

// ---------- Formulir kontak ---------- 
formKontak.addEventListener("submit", function (e) { 
  e.preventDefault();   // cegah halaman dimuat ulang 
 
  const nama = formKontak.nama.value.trim(); 
  const pesan = formKontak.pesan.value.trim(); 
 
  if (nama === "" || pesan === "") { 
    statusEl.textContent = "Nama dan pesan wajib diisi."; 
    return; 
  } 
 
  statusEl.textContent = `Terima kasih, ${nama}! Pesan Anda sudah kami terima.`; 
  formKontak.reset(); 
}); 

// langkah f inisialisasi
// ---------- Inisialisasi ---------- 
// document.getElementById("tahun").textContent = new Date().getFullYear(); 
document.getElementById("tahun").textContent = new Date().getFullYear();
renderMenu(); 
renderFilter(); 
renderProduk(); 


/**
 * Fungsi utama untuk mencari produk berdasarkan slug yang diinputkan pengguna pada elemen HTML.
 * Menerapkan validasi ketat, sanitasi string (trim & lowercase), serta manajemen DOM interaktif.
 */        
function cariSlug() {
    // 1. Mengambil referensi elemen DOM dari antarmuka HTML
    const elemenInputSlug = document.getElementById("inputSlug");
    const divHasilCari = document.getElementById("hasilCari");

    // Pengaman sistem jika elemen HTML tidak ditemukan di dokumen aktif
    if (!elemenInputSlug || !divHasilCari) {
        console.error("Elemen DOM target tidak ditemukan pada halaman ini.");
        return;
    }

    // 2. Sanitasi Input: Menghapus spasi ekstra di awal/akhir dan mengubah ke huruf kecil semua.
    const inputSlug = elemenInputSlug.value.trim().toLowerCase();

    // 3. Validasi Kondisional: Mencegah eksekusi jika kolom input kosong
    if (inputSlug === "") {
        divHasilCari.innerHTML = `<span class="error-msg">Silakan masukkan katakunci!</span>`;
        return;
    }

    // 4. Proses Pencarian Data menggunakan metode built-in Array.prototype.find()
    const hasilPencarianSlug = PRODUCTS.find(function(kopi) {
        return kopi.slug === inputSlug;
    });

    // 5. Render Output Dinamis ke antarmuka HTML berdasarkan ketersediaan data
    if (hasilPencarianSlug) {
        divHasilCari.innerHTML =
        `<br><strong>Produk Ditemukan</strong> <br>
        Nama Produk: ${hasilPencarianSlug.nama} <br>
        Wilayah Asal: ${hasilPencarianSlug.asal} <br>
        Kategori: ${hasilPencarianSlug.kategori} <br>
        Harga Satuan: ${hasilPencarianSlug.harga} <br>
        Deskripsi: ${hasilPencarianSlug.deskripsi}<br>
        `;
        console.info("Output HTML: ", inputSlug, "ditemukan");
    } else {
        divHasilCari.innerHTML = `<br><span>Maaf, produk dengan kode slug <strong>`  + inputSlug + `</strong> tidak ditemukan di dalam direktori penyimpanan.</span>`;
        console.warn("Output HTML: ", inputSlug, "tidak ditemukan");
    }
}
