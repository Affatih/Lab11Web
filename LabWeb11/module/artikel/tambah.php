// tambah.php
<?php
$form = new Form("/LabWeb11/artikel/tambah", "Simpan Artikel"); // <-- Path diperbaiki
$db  = new Database();

if ($_POST) {
    // ... (insert logic) ...
    header("Location: /LabWeb11/artikel/index"); // <-- Path diperbaiki
    exit;
}
// ...

$form->addField("judul", "Judul Artikel");
$form->addField("isi", "Isi Artikel", "textarea");

echo "<h3>Tambah Artikel</h3>";
$form->displayForm();
?>