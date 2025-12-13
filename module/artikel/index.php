<?php
$db = new Database(); // Fatal error terjadi di sini, tapi karena include gagal
$data = $db->query("SELECT * FROM artikel ORDER BY id DESC");
// ...
?>

<h3>Data Artikel</h3>
<p><a href="/LabWeb11/artikel/tambah" class="btn-tambah">+ Tambah Artikel</a></p>

<table class="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Konten</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if ($data && $data->num_rows > 0): ?>
        <?php while($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['judul']) ?></td>
            <td><?= nl2br(htmlspecialchars(substr($row['konten'], 0, 100) . (strlen($row['konten']) > 100 ? '...' : ''))) ?></td>
            <td class="aksi-col">
                <a href="/LabWeb11/artikel/ubah/<?= $row['id'] ?>">Ubah</a> | 
                <a href="/LabWeb11/artikel/hapus/<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4" style="text-align:center;">Belum ada data artikel yang tersedia.</td></tr>
    <?php endif; ?>
    </tbody>
</table>