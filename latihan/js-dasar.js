//tampil di console developer tool
console.log("Halo, Kopi Nusantara");

//tampil di halaman browser
document.write("halo kopi nusantara");

//Materi 3: Variabel, Tipe Data, dan Operator
const namaProduk = "Kopi Gayo"; //nilai tetap: gunakan const
let stok = 20;                  //nilai bisa berubah: gunakan let

//Proses bukan variabel, makanya tidak pakai let
stokAkhir = stok - 1;          
//stok -= 1;

//GABUNGKAN PRODUK DENGAN STOK DAN SISA STOK
//ini adalah produk kopi gayo , stok awal adalah 20, dan stok terkini adalah 19

console.log(namaProduk); 
console.log(stok);

//document.write(stok);

//tidak wajib diikuti, hanya sebagai pembuktian
console.log(typeof namaProduk);
console.log(typeof stok);

//MAter 3: Ada 2 cara menggabungkan teks. 
// 1. dengan tanda +
// 2. dengan template literal (backtik dan ${...})

const nama = "Kopi Pinogu";
const harga = 8000;

console.log("Produk: " + nama + ", harga: Rp" + harga);
console.log(`Produk: ${nama}, harga: Rp ${harga}`);

console.log("Produk: " + namaProduk + ", stok: " + stok + ", stok akhir: " + stokAkhir);
console.log(`Produk: ${namaProduk}, stok: ${stok}, stok akhir: ${stokAkhir}`);

//Materi 4: Input dan Output sederhana
const jumlah = Number(prompt("Jumlah Bungkus"));

//console.log(jumlah.toLocaleString("id-ID")); //console
//alert(jumlah.toLocaleString("id-ID")); //pop up alert

//Tugas:
//Jadikan output di console maupun di alert, format:

//"Jumlah Rokok Djisamsoe ... bungkus"

console.log(`Jumlah Rokok Djisamsoe ${jumlah.toLocaleString("id-ID")} bungkus`);
alert(`Jumlah Rokok Djisamsoe ${jumlah.toLocaleString("id-ID")} bungkus`);