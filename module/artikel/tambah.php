<?php
// File: module/artikel/tambah.php
echo "<h3>Tambah Artikel</h3>";
$form = new Form("/LabWeb11/artikel/tambah", "Simpan Artikel");
$db  = new Database();

if ($_POST) {
    // Memperhatikan nama kolom di DB: 'konten' bukan 'isi'
    $data_insert = [
        "judul" => $_POST['judul'],
        "konten" => $_POST['konten']
    ];
    
    $success = $db->insert("artikel", $data_insert);

    if ($success) {
        header("Location: /LabWeb11/artikel/index");
        exit;
    } else {
        echo '<div style="color: red; padding: 10px;">ERROR: Gagal menyimpan data. Cek error log di Database.php</div>';
    }
}

$form->addField("judul", "Judul Artikel");
$form->addField("konten", "Isi Konten", "textarea"); // Name: konten (sesuai DB)

$form->displayForm();
?>