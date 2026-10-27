// patch-datatable.js
// Memperbaiki distorsi parameter URL (&) akibat proses render Simple-Datatables

document.addEventListener("DOMContentLoaded", function () {
    const tabel = document.querySelector(".tabel-admin");
    if (!tabel) return;

    // Gunakan event delegation untuk memantau semua klik di dalam tabel
    tabel.addEventListener("click", function (e) {
        // Deteksi apakah yang diklik adalah elemen tautan (<a>)
        const tautan = e.target.closest("a");
        
        if (tautan) {
            // Ambil URL mentah langsung dari atribut elemen
            let urlMentah = tautan.getAttribute("href");
            
            // Jika Datatable merusak URL dengan menyisipkan '&amp;'
            if (urlMentah && urlMentah.includes("&amp;")) {
                e.preventDefault(); // Hentikan navigasi yang rusak
                
                // Ganti &amp; kembali menjadi & dan arahkan pengunjung
                window.location.href = urlMentah.replace(/&amp;/g, "&");
            }
        }
    });
});