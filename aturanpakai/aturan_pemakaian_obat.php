<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Aturan Pemakaian Obat</title>
</head>
<body>
    <h2>Tambah Aturan Pemakaian Obat</h2>
    <form action='proses_tambah_aturan.php' method='post'>
        <label for='nama_obat'>Nama Obat:</label>
        <input type='text' id='nama_obat' name='nama_obat' required><br><br>

        <label for='dosis'>Dosis:</label>
        <input type='text' id='dosis' name='dosis' required><br><br>

        <label for='waktu'>Waktu Pemakaian:</label>
        <input type='text' id='waktu' name='waktu' required><br><br>

        <label for='durasi_hari'>Durasi Pemakaian (hari):</label>
        <input type='number' id='durasi_hari' name='durasi_hari' required><br><br>

        <input type='submit' value='Tambah Aturan'>
    </form>
</body>
</html>
