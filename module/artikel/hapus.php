<?php
// File: module/artikel/hapus.php

$db = new Database();
// ID diambil dari segmen ke-2 (Contoh: /artikel/hapus/10)
$id = $segments[2] ?? null; 

if ($id) {
    // Ambil ID tanpa sanitasi karena $_GET['id'] tidak digunakan, tapi $segments
    $id_clean = $db->conn->real_escape_string($id); 
    $db->query("DELETE FROM artikel WHERE id='$id_clean'");
}

// Redirect ke halaman daftar artikel
header("Location: /LabWeb11/artikel/index");
exit;
?>