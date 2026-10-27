// admin.js: mengaktifkan Datatable pada tabel apa pun di halaman admin 
// yang memiliki class "tabel-admin". 
 
document.addEventListener("DOMContentLoaded", function () { 
  const tabel = document.querySelector(".tabel-admin"); 
  if (!tabel) return; 
 
  new simpleDatatables.DataTable(tabel, { 
    perPage: 10, 
    perPageSelect: [5, 10, 25, 50], 
    labels: { 
      placeholder: "Cari...", 
      perPage: "{select} baris per halaman", 
      noRows: "Tidak ada data", 
      info: "Menampilkan {start} sampai {end} dari {rows} baris", 
    }, 
  }); 
});