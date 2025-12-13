<?php 
// File: index.php

// --- DEBUGGING ON (Wajib untuk troubleshooting) ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --------------------

// KRITIS: session_start() harus diletakkan di awal, sebelum output apapun.
session_start();

// DEFINISIKAN ROOT PATH ABSOLUT
define('ROOT_PATH', __DIR__ . '/');

// 1. Memuat file Class dan Config
include ROOT_PATH . "config.php";
include ROOT_PATH . "class/Database.php"; 
include ROOT_PATH . "class/Form.php";     

// 2. Routing Logic
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/artikel/index';
$segments = explode('/', trim($path, '/'));

$mod  = $segments[0] ?? 'artikel';
$page = $segments[1] ?? 'index';

$file = ROOT_PATH . "module/$mod/$page.php"; 

// 3. Memuat Header (Hanya SATU kali)
include ROOT_PATH . "template/header.php"; 

// 4. Memuat Konten Modul
if (file_exists($file)) {
    include $file;
} else {
    echo "<h3>Modul tidak ditemukan: $mod/$page</h3>";
}

// 5. Memuat Footer
include ROOT_PATH . "template/footer.php"; 
?>