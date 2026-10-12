<?php
// Mengambil parameter 'fitur' dari URL. Jika kosong, default ke 'kalkulator'
$fitur_aktif = isset($_GET['fitur']) ? $_GET['fitur'] : 'kalkulator';
$hasil = "";

// 1. Logika Kalkulator
if (isset($_POST['hitung_kalkulator'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operator = $_POST['operator'];

    if (is_numeric($angka1) && is_numeric($angka2)) {
        switch ($operator) {
            case '+': $hasil = $angka1 + $angka2; break;
            case '-': $hasil = $angka1 - $angka2; break;
            case '*': $hasil = $angka1 * $angka2; break;
            case '/': 
                $hasil = ($angka2 != 0) ? $angka1 / $angka2 : "Error: Tidak bisa dibagi nol!"; 
                break;
        }
    } else {
        $hasil = "Masukkan angka yang valid.";
    }
}

// 2. Logika Pengecek Ganjil Genap
if (isset($_POST['cek_angka'])) {
    $angka_cek = $_POST['angka_cek'];
    if (is_numeric($angka_cek)) {
        $status = ($angka_cek % 2 == 0) ? "Genap" : "Ganjil";
        $hasil = "Angka $angka_cek adalah bilangan **$status**.";
    } else {
        $hasil = "Tolong masukkan angka.";
    }
}

// 3. Logika Penghitung Kata
if (isset($_POST['hitung_kata'])) {
    $teks = $_POST['teks'];
    $jumlah_kata = str_word_count($teks);
    $jumlah_karakter = strlen($teks);
    $hasil = "Jumlah Kata: $jumlah_kata <br> Jumlah Karakter: $jumlah_karakter";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Serba Guna PHP</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        .nav { display: flex; justify-content: space-around; margin-bottom: 20px; flex-wrap: wrap; gap: 10px; }
        .nav a { text-decoration: none; padding: 10px 15px; background: #007BFF; color: white; border-radius: 5px; font-size: 14px; transition: 0.3s; }
        .nav a:hover { background: #0056b3; }
        .form-group { margin-bottom: 15px; }
        input[type="number"], input[type="text"], textarea, select { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        button:hover { background: #218838; }
        .result { margin-top: 20px; padding: 15px; background: #e9ecef; border-left: 5px solid #007BFF; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>🛠️ App Serba Guna</h2>
    
    <!-- Menu Navigasi -->
    <div class="nav">
        <a href="?fitur=kalkulator">Kalkulator</a>
        <a href="?fitur=ganjil_genap">Cek Angka</a>
        <a href="?fitur=hitung_kata">Hitung Kata</a>
    </div>

    <!-- Tampilan Kalkulator -->
    <?php if ($fitur_aktif == 'kalkulator'): ?>
        <form method="POST">
            <div class="form-group">
                <input type="number" name="angka1" placeholder="Masukkan Angka Pertama" step="any" required>
            </div>
            <div class="form-group">
                <select name="operator">
                    <option value="+">Tambah (+)</option>
                    <option value="-">Kurang (-)</option>
                    <option value="*">Kali (x)</option>
                    <option value="/">Bagi (/)</option>
                </select>
            </div>
            <div class="form-group">
                <input type="number" name="angka2" placeholder="Masukkan Angka Kedua" step="any" required>
            </div>
            <button type="submit" name="hitung_kalkulator">Hitung</button>
        </form>

    <!-- Tampilan Pengecek Ganjil Genap -->
    <?php elseif ($fitur_aktif == 'ganjil_genap'): ?>
        <form method="POST">
            <div class="form-group">
                <input type="number" name="angka_cek" placeholder="Masukkan Sembarang Angka" required>
            </div>
            <button type="submit" name="cek_angka">Cek Status Angka</button>
        </form>

    <!-- Tampilan Penghitung Kata -->
    <?php elseif ($fitur_aktif == 'hitung_kata'): ?>
        <form method="POST">
            <div class="form-group">
                <textarea name="teks" rows="5" placeholder="Ketik atau paste teks di sini..." required></textarea>
            </div>
            <button type="submit" name="hitung_kata">Hitung Kata & Karakter</button>
        </form>
    <?php endif; ?>

    <!-- Menampilkan Hasil -->
    <?php if ($hasil != ""): ?>
        <div class="result">
            Hasil: <br> <?php echo $hasil; ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
