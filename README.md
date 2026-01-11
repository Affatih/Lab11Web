# Laporan Praktikum 11: Implementasi Routing & Struktur Modular

## 1. Tujuan Praktikum
Membangun kerangka kerja (framework) sederhana yang terorganisir dengan memisahkan logika bisnis, layout, dan pustaka kode (library).

## 2. Struktur Proyek Modular
Proyek diatur ke dalam folder spesifik untuk memudahkan manajemen kode:
* **`class/`**: Menyimpan library OOP (Contoh: `Database.php`).
* **`module/`**: Berisi modul fitur aplikasi (Contoh: `module/barang/`).
* **`index.php`**: Sebagai file utama (Front Controller) yang menangani semua permintaan.

## 3. Mekanisme Routing
Aplikasi ini menggunakan metode **URL Parameters** untuk menentukan halaman mana yang akan dimuat. 

**Logika Routing di `index.php`:**
```php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

switch ($page) {
    case 'dashboard':
        include "module/dashboard/index.php";
        break;
    case 'barang_index':
        include "module/barang/index.php";
        break;
    // ... case lainnya
}
```

**Halaman Dashboard (Default Route)**
<img width="1366" height="768" alt="Screenshot at 2026-01-11 04-25-57" src="https://github.com/user-attachments/assets/2800d468-627a-4c39-99c8-93c37649ae51" />


**Halaman Manajemen Barang (Module Route)**
<img width="1366" height="768" alt="Screenshot at 2026-01-11 04-26-14" src="https://github.com/user-attachments/assets/42dac580-1237-400c-b852-738979cc69ef" />

