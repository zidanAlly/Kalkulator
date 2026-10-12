<?php
// Mengatur header agar browser membacanya sebagai teks mentah (Plain Text), bukan halaman web HTML
header("Content-Type: text/plain");

echo "========== APLIKASI SERBA GUNA PURE PHP ==========\n\n";

// Mengambil instruksi dari parameter URL
$fitur = isset($_GET['fitur']) ? $_GET['fitur'] : '';

if ($fitur == 'kalkulator') {
    $angka1 = isset($_GET['angka1']) ? (float)$_GET['angka1'] : 0;
    $angka2 = isset($_GET['angka2']) ? (float)$_GET['angka2'] : 0;
    $operator = isset($_GET['operator']) ? $_GET['operator'] : '';

    echo "[ FITUR KALKULATOR ]\n";
    if ($operator == 'tambah') {
        echo "Hasil: $angka1 + $angka2 = " . ($angka1 + $angka2);
    } elseif ($operator == 'kurang') {
        echo "Hasil: $angka1 - $angka2 = " . ($angka1 - $angka2);
    } elseif ($operator == 'kali') {
        echo "Hasil: $angka1 * $angka2 = " . ($angka1 * $angka2);
    } elseif ($operator == 'bagi') {
        if ($angka2 != 0) {
            echo "Hasil: $angka1 / $angka2 = " . ($angka1 / $angka2);
        } else {
            echo "Error: Tidak bisa dibagi dengan angka 0!";
        }
    } else {
        echo "Error: Operator tidak valid. Gunakan operator=tambah/kurang/kali/bagi";
    }

} elseif ($fitur == 'ganjil_genap') {
    $angka = isset($_GET['angka']) ? (int)$_GET['angka'] : 0;
    $status = ($angka % 2 == 0) ? "Genap" : "Ganjil";
    
    echo "[ FITUR CEK GANJIL GENAP ]\n";
    echo "Angka $angka adalah bilangan $status.";

} elseif ($fitur == 'hitung_kata') {
    $teks = isset($_GET['teks']) ? $_GET['teks'] : '';
    
    echo "[ FITUR PENGHITUNG KATA ]\n";
    echo "Teks: $teks\n";
    echo "Jumlah Kata: " . str_word_count($teks) . "\n";
    echo "Jumlah Karakter: " . strlen($teks);

} else {
    echo "Status: Aplikasi menyala!\n";
    echo "Karena tidak ada HTML, jalankan fitur dengan menambahkan perintah di akhir link URL.\n\n";
    echo "CONTOH CARA PAKAI (Tambahkan di akhir link browser):\n";
    echo "1. Kalkulator   -> ?fitur=kalkulator&angka1=10&angka2=5&operator=tambah\n";
    echo "2. Ganjil Genap -> ?fitur=ganjil_genap&angka=7\n";
    echo "3. Hitung Kata  -> ?fitur=hitung_kata&teks=halo+semua\n";
}
?>
