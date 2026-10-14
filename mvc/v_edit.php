<html>
<head><title>Edit Proker</title></head>
<body>
    <h2>Edit Program Kerja</h2>
    <form action="index.php?act=update" method="POST">
        <input type="hidden" name="nomorProgram" value="<?= $data['nomorProgram']; ?>">
        
        <label>Nomor Program (Readonly):</label><br>
        <input type="number" value="<?= $data['nomorProgram']; ?>" disabled><br><br>
        
        <label>Nama Program:</label><br>
        <input type="text" name="namaProgram" value="<?= $data['namaProgram']; ?>" required><br><br>
        
        <label>Surat Keterangan:</label><br>
        <input type="text" name="suratKeterangan" value="<?= $data['suratKeterangan']; ?>" required><br><br>
        
        <button type="submit">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>