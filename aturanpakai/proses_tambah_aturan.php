<?php
// Lakukan koneksi ke database di sini
include "../config/koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_obat = $_POST['nama_obat'];
    $dosis = $_POST['dosis'];
    $waktu = $_POST['waktu'];
    $durasi_hari = $_POST['durasi_hari'];

    // Tambahkan aturan pemakaian obat ke dalam tabel aturan_pemakaian_obat
    $sql = "INSERT INTO aturan_pemakaian_obat (nama_obat, dosis, waktu, durasi_hari) VALUES ('$nama_obat', '$dosis', '$waktu', '$durasi_hari')";

    if ($conn->query($sql) === TRUE) {
        echo "Aturan pemakaian obat berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database di sini
?>
