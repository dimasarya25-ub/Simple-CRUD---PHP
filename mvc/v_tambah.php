<html>
<head><title>Tambah Proker</title></head>
<body>
    <h2>Tambah Program Kerja</h2>
    <form action="index.php?act=simpan" method="POST">
        <label>Nomor Program:</label><br>
        <input type="number" name="nomorProgram" required><br><br>
        <label>Nama Program:</label><br>
        <input type="text" name="namaProgram" required><br><br>
        <label>Surat Keterangan:</label><br>
        <input type="text" name="suratKeterangan" required><br><br>
        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>