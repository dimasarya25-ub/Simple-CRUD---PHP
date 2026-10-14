<?php
$isKepala = (
    $_SESSION['jabatan'] == 'Kepala Departemen'
);
?>

<html>
<head>
    <title>Daftar Program Kerja BEM</title>
</head>
<body>

    <h2>Daftar Program Kerja BEM</h2>

    <p>
        Login sebagai:
        <?= htmlspecialchars($_SESSION['nama']) ?>
        (<?= htmlspecialchars($_SESSION['jabatan']) ?>)
    </p>

    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>

    <?php if ($isKepala): ?>
        <br>
        <a href="index.php?act=tambah">
            + Tambah Program Kerja
        </a>
        <br><br>
    <?php endif; ?>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Program Kerja</th>
            <th>Surat Keterangan</th>

            <?php if ($isKepala): ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>

        <?php foreach ($proker as $p): ?>
            <tr>
                <td>
                    <?= htmlspecialchars($p['nomorProgram']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($p['namaProgram']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($p['suratKeterangan']) ?>
                </td>

                <?php if ($isKepala): ?>
                    <td>
                        <a href="index.php?act=edit&amp;nomor=<?= urlencode($p['nomorProgram']) ?>">
                            Edit
                        </a>
                        |
                        <a
                            href="index.php?act=hapus&amp;nomor=<?= urlencode($p['nomorProgram']) ?>"
                            onclick="return confirm('Yakin hapus?')"
                        >
                            Hapus
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>