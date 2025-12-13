<?php
// File: module/artikel/ubah.php
echo "<h3>Ubah Artikel</h3>";

$db = new Database();
// ID diambil dari segmen ke-2 (Contoh: /artikel/ubah/10)
$id = $segments[2] ?? null; 

if (!$id) {
    echo '<div style="color: red;">ID Artikel tidak ditemukan.</div>';
    return;
}

$data_lama = $db->get("artikel", "id=$id");

if (!$data_lama) {
    echo '<div style="color: red;">Data artikel tidak ditemukan.</div>';
    return;
}

$form_action = "/LabWeb11/artikel/ubah/$id";
$form = new Form($form_action, "Update Artikel");

if ($_POST) {
    $data_update = [
        "judul" => $_POST['judul'],
        "konten" => $_POST['konten']
    ];

    $success = $db->update("artikel", $data_update, "id=$id");

    if ($success) {
        header("Location: /LabWeb11/artikel/index");
        exit;
    } else {
        echo '<div style="color: red;">ERROR: Gagal mengupdate data.</div>';
    }
}

$form->addField("judul", "Judul Artikel");
$form->addField("konten", "Isi Konten", "textarea");

// Form ditampilkan dengan data lama melalui JavaScript
?>

<script>
window.onload = function() {
    // Memastikan field form terisi dengan data lama
    document.getElementsByName('judul')[0].value = "<?= htmlspecialchars($data_lama['judul']) ?>";
    document.getElementsByName('konten')[0].value = "<?= htmlspecialchars($data_lama['konten']) ?>";
};
</script>

<?php $form->displayForm(); ?>