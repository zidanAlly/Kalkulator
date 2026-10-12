<?php

// 1. LOGIKA PERHITUNGAN
$hasil_tampil = "";
if (isset($_POST['hitung'])) {
    $harga_beli = (float)$_POST['harga_beli'];
    $jumlah = (float)$_POST['jumlah'];
    
    if ($jumlah > 0) {
        $hpp = $harga_beli / $jumlah;
        $rupiah = "Rp " . number_format($hpp, 0, ',', '.');
        
        $hasil_tampil = "
        <div class='result-box'>
            <span style='color:#2c3e50; font-size:14px;'>HPP (Modal per Pcs)</span><br>
            <strong style='color:#16a085; font-size:18px;'>$rupiah</strong>
        </div>";
    }
}

// 2. MENCETAK CSS (Diizinkan karena di-echo oleh PHP)
echo "<style>
    body { font-family: 'Segoe UI', Tahoma, sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; padding-top: 50px; }
    .card { background-color: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 100%; max-width: 400px; padding: 25px; }
    h2 { color: #2c3e50; border-bottom: 2px solid #ecf0f1; padding-bottom: 10px; font-size: 20px; }
    label { font-size: 14px; color: #34495e; font-weight: 500; display: block; margin-bottom: 5px; margin-top: 15px;}
    input { width: 93%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 6px; outline: none; }
    input:focus { border-color: #3498db; }
    .btn { background-color: #27ae60; color: white; border: none; padding: 12px; width: 100%; border-radius: 6px; font-weight: bold; cursor: pointer; margin-top: 20px; }
    .btn:hover { background-color: #219653; }
    .result-box { margin-top: 20px; background-color: #e8f8f5; border: 1px solid #a3e4d7; padding: 15px; border-radius: 8px; }
</style>";

// 3. MENCETAK TAMPILAN MENGGUNAKAN PERINTAH ECHO PHP
echo "<div class='card'>";
echo "<h2>🛒 Kalkulator HPP Toko</h2>";

// Form input dicetak menggunakan PHP
echo "<form method='POST'>";
echo "<label>Total Harga Beli dari Supplier (Rp)</label>";
echo "<input type='number' name='harga_beli' placeholder='Contoh: 500000' required>";

echo "<label>Jumlah Barang (Pcs)</label>";
echo "<input type='number' name='jumlah' placeholder='Contoh: 50' required>";

echo "<button type='submit' name='hitung' class='btn'>Hitung HPP</button>";
echo "</form>";

// Menampilkan hasil (jika variabel hasil_tampil sudah terisi)
echo $hasil_tampil;

echo "</div>";
?>
