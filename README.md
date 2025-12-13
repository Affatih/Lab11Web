#  Praktikum 11 - PHP OOP Lanjutan (Simple MVC Router)
Aplikasi web ini dikembangkan sebagai bagian dari praktikum lanjutan PHP yang berfokus pada implementasi dasar CRUD (Create, Read, Update, Delete) menggunakan konsep Object-Oriented Programming (OOP) dan pola dasar Simple MVC Router untuk membuat URL yang bersih (Pretty URL).

Aplikasi ini berjalan di lingkungan XAMPP (Linux/Parrot OS), yang memerlukan konfigurasi server Apache (mod_rewrite dan AllowOverride) untuk fungsionalitas routing URL.

#  Tools yang Digunakan
Bahasa Pemrograman: PHP 8.x

Database: MariaDB (Melalui XAMPP)

Web Server: Apache (Melalui XAMPP)

Arsitektur: PHP OOP (Class-based), Simple Router (URL Mapping via .htaccess)

Tampilan: HTML/CSS (Tanpa framework CSS)

#  Struktur Folder Proyek
Proyek ini memiliki struktur folder yang rapi dan terorganisir untuk memisahkan logika (kelas), tampilan (template), dan modul (konten halaman).

```
labweb11/
├── class/
│   ├── Database.php      # Class untuk koneksi dan operasi database (CRUD)
│   └── Form.php          # Class untuk validasi dan sanitasi input form
├── config.php            # File konfigurasi (kredensial DB)
├── .htaccess             # Aturan RewriteEngine untuk routing URL
├── index.php             # Router utama (entry point) aplikasi
├── module/
│   └── artikel/          # Folder untuk modul Artikel
│       ├── hapus.php     # Logika menghapus artikel
│       ├── index.php     # Menampilkan daftar artikel (Read)
│       ├── tambah.php    # Form dan logika menambah artikel (Create)
│       └── ubah.php      # Form dan logika mengubah artikel (Update)
└── template/
    ├── footer.php        # Bagian bawah HTML (penutup tag body/html)
    ├── header.php        # Bagian atas HTML (metadata, CSS, pembuka tag body)
    └── sidebar.php       # Menu navigasi samping
```

#  Konfigurasi Server (Wajib)
Karena aplikasi menggunakan URL cantik (/artikel/index), Anda harus memastikan Apache di XAMPP Anda dikonfigurasi dengan benar.

#  Struktur Kode Utama
Berikut adalah kode untuk beberapa file kunci yang menjadi jantung dari router dan penanganan path absolut.

1. config.php (Pengaturan Database)

```
<?php
// File: config.php

// Kredensial Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Ganti jika Anda menggunakan user DB lain
define('DB_PASS', '');     // Ganti jika Anda menggunakan password DB
define('DB_NAME', 'labweb11_db');

// Nama tabel
define('TABLE_ARTIKEL', 'artikel');
?>
```
#  2. index.php (Router Utama dan Absolute Path Handler)
File ini adalah entry point yang memetakan URL ke file modul yang sesuai, sambil memastikan semua include menggunakan path absolut (ROOT_PATH).

```
<?php 
// File: index.php

// --- DEBUGGING ON ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --------------------

// KRITIS: session_start() harus diletakkan di awal, sebelum output apapun.
session_start();

// DEFINISIKAN ROOT PATH ABSOLUT untuk mengatasi masalah path di Linux
define('ROOT_PATH', __DIR__ . '/');

// 1. Memuat file Class dan Config
include ROOT_PATH . "config.php";
include ROOT_PATH . "class/Database.php"; 
include ROOT_PATH . "class/Form.php";     

// 2. Routing Logic: Mengurai URL
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/artikel/index';
$segments = explode('/', trim($path, '/'));

$mod  = $segments[0] ?? 'artikel';
$page = $segments[1] ?? 'index';

$file = ROOT_PATH . "module/$mod/$page.php"; 

// 3. Memuat Template Header
include ROOT_PATH . "template/header.php"; 

// 4. Memuat Konten Modul
if (file_exists($file)) {
    include $file;
} else {
    echo "<h3>Modul tidak ditemukan: $mod/$page</h3>";
}

// 5. Memuat Template Footer
include ROOT_PATH . "template/footer.php"; 
?>
```
#  Tampilan
<img width="1366" height="768" alt="Screenshot at 2025-12-13 10-07-32" src="https://github.com/user-attachments/assets/4ed95fa1-e633-4708-a7f7-e8760d674a04" />
<img width="1366" height="768" alt="Screenshot at 2025-12-13 10-10-53" src="https://github.com/user-attachments/assets/999efc19-359e-4f10-aeec-99f44676545f" />



