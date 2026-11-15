<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Praktikum PHP</title>
</head>

<body>
    <h1>Belajar PHP</h1>
    <?php
    echo "<p>PHP berhasil dijalankan.</p>";
    echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
    ?>


    <?php
    $nama = "Siti";
    $tugas = 85;
    $uts = 78;
    $uas = 90;
    $rata = ($tugas + $uts + $uas) / 3;
    $nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
    if ($nilaiAkhir >= 85) {
        $predikat = "A";
    } elseif ($nilaiAkhir >= 75) {
        $predikat = "B";
    } elseif ($nilaiAkhir >= 60) {
        $predikat = "C";
    } else {
        $predikat = "D";
    }
    echo "Nama: " . htmlspecialchars($nama) . "<br>";
    echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
    echo "Predikat: " . $predikat . "<br>";
    echo "nilai rata-rata:" . $rata;
    ?>


    <?php
    $mahasiswa = ["Alya", "Bima", "Citra", "Doni"];
    echo "<h3>Daftar Mahasiswa</h3><ol>";
    foreach ($mahasiswa as $nama) {
        echo "<li>" . htmlspecialchars($nama) . "</li>";
    }
    echo "</ol>";
    ?>

    <?php
    function hitungDiskon($harga, $persen)
    {
        $potongan = $harga * ($persen / 100);
        return $harga - $potongan;
    }

    // Function baru untuk format Rupiah
    function formatRupiah($angka)
    {
        return "Rp" . number_format($angka, 0, ",", ".");
    }

    $hargaAkhir = hitungDiskon(150000, 10);
    echo "Harga setelah diskon: " . formatRupiah($hargaAkhir);
    ?>



    <!-- cari.php -->
    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text">
        <button type="submit">Cari</button>
    </form>
    <?php
    if (isset($_GET["kata"])) {
        $kata = trim($_GET["kata"]);
        echo "Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8");
    }
    ?>
    <!-- index.php -->
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input id="nama" name="nama" type="text" required>
        <label for="prodi">Program Studi:</label>
        <input id="prodi" name="prodi" type="text" required>
        <button type="submit" name="kirim">Kirim Data</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = trim($_POST["nama"] ?? "");
        $prodi = trim($_POST["prodi"] ?? "");
        if ($nama === "" || $prodi === "") {
            echo "<p>Semua kolom wajib diisi.</p>";
        } else {
            echo "<h3>Data diterima</h3>";
            echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
            echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8");
        }
    }
    ?>

    <?php
    $hasil = null;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $barang = trim($_POST["barang"] ?? "");
        $hargaInput = $_POST["harga"] ?? "";
        $jumlahInput = $_POST["jumlah"] ?? "";
        if (
            $barang === "" || !is_numeric($hargaInput) ||
            !ctype_digit((string)$jumlahInput) ||
            (float)$hargaInput < 0 || (int)$jumlahInput < 1
        ) {
            $error = "Periksa kembali nama barang, harga, dan jumlah.";
        } else {
            $harga = (float)$hargaInput;
            $jumlah = (int)$jumlahInput;
            $subtotal = $harga * $jumlah;
        }
    }
    ?>
    <form method="POST">
        <label>Nama barang <input name="barang" required></label>
        <label>Harga <input name="harga" type="number" min="0" step="0.01" required></label>
        <label>Jumlah <input name="jumlah" type="number" min="1" step="1" required></label>
        <button type="submit">Hitung</button>
    </form>
    <?php
    if (isset($error)) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    } elseif (isset($subtotal)) {
        echo "<p>Barang: " . htmlspecialchars($barang) . "</p>";
        echo "<p>Subtotal: Rp" . number_format($subtotal, 0, ",", ".") . "</p>";
    } ?>




    <h2>Projek Mini - aplikasi formulir data siswa</h2>
    <?php
    $data = null;
    $error = [];

    // Menyimpan nilai input sebelumnya agar tidak hilang saat validasi gagal
    $nama = "";
    $nim = "";
    $prodi = "";
    $semesterInput = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = trim($_POST["nama"] ?? "");
        $nim = trim($_POST["nim"] ?? "");
        $prodi = trim($_POST["prodi"] ?? "");
        $semesterInput = trim($_POST["semester"] ?? "");
        $email = trim($_POST["email"] ?? "");

        if ($nama === "") $error[] = "Nama wajib diisi.";
        if ($nim === "") $error[] = "NIM wajib diisi.";
        if ($prodi === "") $error[] = "Program studi wajib diisi.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Format email tidak valid.";
        }
        if (!ctype_digit((string)$semesterInput) || (int)$semesterInput < 1 || (int)$semesterInput > 14) {
            $error[] = "Semester harus berupa angka 1-14.";
        }

        if (!$error) {
            $data = compact("nama", "nim", "prodi", "email");
            $data["semester"] = (int)$semesterInput;
        }
    }
    ?>


    <p>Formulir Data Mahasiswa</p>

    <!-- Menampilkan daftar error jika validasi gagal -->
    <?php if (!empty($error)): ?>

        <strong>Terjadi kesalahan:</strong>
        <ul>
            <?php foreach ($error as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Form Input Data -->
    <form method="POST" action="">

        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama) ?>">


        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?= htmlspecialchars($nim) ?>">

        <label for="prodi">Program Studi:</label>
        <select id="prodi" name="prodi">
            <option value="">-- Pilih Program Studi --</option>
            <option value="Teknik Informatika" <?= $prodi === "Teknik Informatika" ? "selected" : "" ?>>Teknik Informatika</option>
            <option value="Sistem Informasi" <?= $prodi === "Sistem Informasi" ? "selected" : "" ?>>Sistem Informasi</option>
            <option value="Teknik Industri" <?= $prodi === "Teknik Industri" ? "selected" : "" ?>>Teknik Industri</option>
        </select>



        <label for="semester">Semester (1-14):</label>
        <input type="number" id="semester" name="semester" min="1" max="14" value="<?= htmlspecialchars($semesterInput) ?>">



        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">


        <button type="submit">Kirim Data</button>
    </form>

    <!-- Menampilkan Ringkasan Data jika validasi berhasil -->
    <?php if ($data !== null): ?>
        <h3>Ringkasan Data Mahasiswa</h3>
        <p><strong>Nama:</strong> <?= htmlspecialchars($data["nama"]) ?></p>
        <p><strong>NIM:</strong> <?= htmlspecialchars($data["nim"]) ?></p>
        <p><strong>Program Studi:</strong> <?= htmlspecialchars($data["prodi"]) ?></p>
        <p><strong>Semester:</strong> <?= htmlspecialchars((string)$data["semester"]) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($data["email"]) ?></p>
    <?php endif; ?>


    <?php
    $daftarNama = ["Andi Pratama", "Budi Santoso", "Citra Lestari", "Dewi Anggraini", "Budi Setiawan"];
    $cari = trim($_GET["cari"] ?? "");

    $hasil = $cari === "" ? $daftarNama : array_filter($daftarNama, fn($nama) => stripos($nama, $cari) !== false);
    ?>

    <form method="GET">
        <input type="text" name="cari" placeholder="Cari nama..." value="<?= htmlspecialchars($cari) ?>">
        <button type="submit">Cari</button>
        <a href="?"><button type="button">Reset</button></a>
    </form>

    <ul>
        <?php foreach ($hasil as $nama): ?>
            <li><?= htmlspecialchars($nama) ?></li>
        <?php endforeach; ?>
    </ul>




    <?php
    $pesan = "";
    $nim = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nim = trim($_POST["nim"] ?? "");

        if ($nim === "") {
            $pesan = "NIM wajib diisi.";
        } elseif (!ctype_digit($nim) || strlen($nim) !== 10) {
            $pesan = "NIM harus berupa angka dan tepat 10 digit.";
        } else {
            $pesan = "Valid! NIM Anda: " . htmlspecialchars($nim);
        }
    }
    ?>

    <form method="POST">
        <input type="text" name="nim" placeholder="Masukkan 10 digit NIM" value="<?= htmlspecialchars($nim) ?>">
        <button type="submit">Cek NIM</button>
    </form>

    <p><?= $pesan ?></p>

</body>

</html>


</body>

</html>