// data.js: semua data ada di sini, terpisah dari logika program.
//  // Ingin menambah menu atau produk? Cukup ubah berkas ini.

const SITE = {
       nama: "Kopi Nusantara",   email: "halo@kopinusantara.test", 
}; 
const MENU = [   
        {id: "beranda", label: "Beranda" },
        { id: "produk", label: "Produk" }, 
        { id: "kontak", label: "Kontak" },

];

const PRODUCTS = [
        { slug: "toraja",       nama: "Kopi Toraja",        asal: "Sulawesi Selatan",   kategori: "arabika", harga: 85000,      deskripsi: "Body tebal, aroma rempah dan cokelat gelap.", gambar: src="img/desain-bungkus-Kopi-bubuk-Bunda-Hara-300x300.jpg"},
        { slug: "gayo",         nama: "Kopi Gayo",          asal: "Aceh",               kategori: "arabika", harga: 80000,      deskripsi: "Rasa bersih dengan sentuhan karamel.", gambar: src="img/images 2.jpg"},
        { slug: "kintamani",    nama: "Kopi Kintamani",     asal: "Bali",               kategori: "arabika", harga: 90000,      deskripsi: "Keasaman cerah seperti jeruk, ringan dan segar.", gambar: src="img/images 3.jpg" },
        { slug: "bajawa",       nama: "Kopi Bajawa",        asal: "Flores",             kategori: "arabika", harga: 88000,      deskripsi: "Aroma floral dengan aftertaste manis.", gambar: src="img/images 4.jpg"}, 
        { slug: "lampung",      nama: "Robusta Lampung",    asal: "Lampung",            kategori: "robusta", harga: 60000,      deskripsi: "Pahit tegas dan kental, cocok untuk kopi susu.", gambar: src="img/images 5.jpg" }, 
        { slug: "temanggung",   nama: "Robusta Temanggung", asal: "Jawa Tengah",        kategori: "robusta", harga: 65000,      deskripsi: "Rasa earthy dengan aroma kacang panggang.", gambar: src="img/images 6.jpg" },
     ]; 


