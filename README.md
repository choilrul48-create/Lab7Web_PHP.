# Praktikum 7 --- Pemrograman Server-Side dengan PHP

## 1. Tujuan Praktikum

Praktikum ini bertujuan untuk:

-   Memahami perbedaan pemrosesan **client-side** dan **server-side**.
-   Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.
-   Menggunakan variabel, tipe data, operator, percabangan, perulangan,
    array, dan function.
-   Menerima serta memproses data dari form HTML menggunakan metode
    **GET** dan **POST**.
-   Melakukan validasi dan sanitasi input sebelum data ditampilkan atau
    diproses.
-   Membuat aplikasi sederhana untuk menerima, memproses, dan
    menampilkan data pengguna.

## 2. Perangkat yang Digunakan

Perangkat lunak dan perangkat yang diperlukan:

-   Laptop atau PC.
-   Web browser, seperti Google Chrome atau Mozilla Firefox.
-   Visual Studio Code atau editor kode lainnya.
-   PHP.
-   Server lokal, seperti **XAMPP** atau **Laragon** (menyediakan PHP
    dan web server Apache/Nginx).

## 3. Cara Menjalankan Server Lokal

### Menggunakan XAMPP

1.  Instal dan buka aplikasi XAMPP.

2.  Salin folder proyek `Lab7Web_PHP` ke dalam folder `htdocs` milik
    XAMPP. Biasanya lokasinya `C:\xampp\htdocs\`.

3.  Buka XAMPP Control Panel, lalu klik **Start** pada layanan
    **Apache**.

4.  Buka folder proyek `Lab7Web_PHP` menggunakan Visual Studio Code.

5.  Jalankan file PHP melalui browser dengan alamat:

    `http://localhost/Lab7Web_PHP/`

6.  Untuk membuka file latihan tertentu, gunakan alamat sesuai nama
    file. Contoh:

    `http://localhost/Lab7Web_PHP/latihan1/index.php`

**Catatan:** Jangan menjalankan file PHP dengan klik ganda atau
membukanya menggunakan alamat `file:///`. File PHP harus diakses melalui
web server lokal.

### Menggunakan Laragon

1.  Instal dan buka Laragon.
2.  Letakkan folder proyek `Lab7Web_PHP` di direktori web Laragon,
    biasanya `C:\laragon\www\`.
3.  Klik **Start All** untuk menjalankan layanan web server.
4.  Akses proyek melalui browser, misalnya
    `http://localhost/Lab7Web_PHP/`.

## 4. Struktur File Proyek


``` text
Lab7Web_PHP/
├── README.md
├── latihan1/
│   └── index.php
├── latihan2/
│   └── index.php
├── latihan3/
│   └── index.php
├── latihan4/
│   └── index.php
├── latihan5/
│   └── cari.php
├── latihan6/
│   └── index.php
├── latihan7/
│   └── index.php
├── mini-project/
│   └── index.php
└── screenshot/
    ├── latihan1.png
    ├── latihan2.png
    ├── latihan3.png
    ├── latihan4.png
    ├── latihan5.png
    ├── latihan6.png
    ├── latihan7.png
    └── mini-project.png
```

Keterangan:

-   `latihan1`: menjalankan PHP dan menampilkan output sederhana.
-   `latihan2`: menggunakan variabel, operator, dan percabangan untuk
    menghitung nilai.
-   `latihan3`: menggunakan array dan perulangan `foreach` untuk
    menampilkan daftar mahasiswa.
-   `latihan4`: membuat dan menggunakan function, misalnya untuk
    menghitung diskon.
-   `latihan5`: memproses form pencarian menggunakan metode GET.
-   `latihan6`: memproses form data menggunakan metode POST.
-   `latihan7`: mengolah data barang, harga, jumlah, dan subtotal.
-   `mini-project`: formulir data mahasiswa dengan validasi input.
-   `screenshot`: menyimpan tangkapan layar hasil pengujian setiap
    latihan.

## 5. kasus valid dan tidak valid

1. Kasus Input Valid (Data Diterima & Diproses)

• Kasus Valid 1: Pengisian Data Lengkap Sesuai Format. Pengguna mengisi semua kolom dengan benar, misalnya Nama: Choirul Majid, NIM: 3124101234 (10 digit angka murni). 

• Kasus Valid 2: Input Mengandung Spasi Ekstra di Awal atau Akhir. Pengguna tidak sengaja mengetik spasi sebelum atau sesudah teks, misalnya Nama: "  Andi Pratama  " atau NIM: " 3124105678 ". Karena kode menggunakan fungsi trim(), spasi berlebih tersebut otomatis dibersihkan terlebih dahulu sehingga data tetap dianggap sah dan diproses normal.

2. Kasus Input Tidak Valid (Data Ditolak & Muncul Error)

• Kasus Tidak Valid 1: NIM Mengandung Huruf atau Jumlah Digit Tidak Sesuai. Pengguna memasukkan NIM berupa 312410ABCD (mengandung huruf) atau 312410 (kurang dari 10 digit).

• Kasus Tidak Valid 2: Format Email Salah dan Semester di Luar Batas. Pengguna mengetik email tanpa domain lengkap (misalnya majid@kampus) atau mengisi semester dengan angka 0 maupun 18. Fungsi filter_var(..., FILTER_VALIDATE_EMAIL) dan pengecekan rentang angka 1–14 akan menggagalkan validasi dan menampilkan daftar kesalahan di layar.

## 6. Ringkasan Hasil Praktikum

Melalui praktikum ini dapat mempelajari dasar pemrograman
server-side menggunakan PHP. File PHP dijalankan melalui server lokal
dan hasil pemrosesannya ditampilkan pada browser.

Materi dan latihan mencakup penggunaan variabel dan tipe data, operator,
percabangan, perulangan, array, serta function. Praktikum juga
menerapkan pemrosesan form menggunakan metode GET dan POST, validasi
data di sisi server, serta penggunaan `htmlspecialchars()` untuk
membantu mengamankan output dari input pengguna.

Pada latihan pengolahan data, PHP digunakan untuk menghitung subtotal
berdasarkan harga dan jumlah barang. Pada mini project, konsep tersebut
dikembangkan menjadi formulir data mahasiswa yang memeriksa kelengkapan
data, format email, dan rentang semester sebelum menampilkan ringkasan
data.

