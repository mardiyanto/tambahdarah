<?php
include "../config/koneksi.php";

if ($conn) {
    $sql = "SELECT * FROM aturan_pemakaian_obat";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_aturan = $row['id_aturan'];
            $durasi_hari = $row['durasi_hari'];
            $waktu = $row['waktu'];

            $tanggal_sekarang = date('Y-m-d');
            $tanggal_akhir = date('Y-m-d', strtotime('+' . $durasi_hari . ' days', strtotime($tanggal_sekarang)));

            while (strtotime($tanggal_sekarang) < strtotime($tanggal_akhir)) {
                $sql_insert_jadwal = "INSERT INTO jadwal_pemakaian_obat (id_aturan, tanggal, waktu) VALUES ('$id_aturan', '$tanggal_sekarang', '$waktu')";
                $result_insert = $conn->query($sql_insert_jadwal);

                if (!$result_insert) {
                    echo "Error: " . $sql_insert_jadwal . "<br>" . $conn->error;
                }

                $tanggal_sekarang = date('Y-m-d', strtotime('+1 day', strtotime($tanggal_sekarang)));
            }
        }

        echo "Jadwal pemakaian obat berhasil dibuat untuk satu bulan.";
    } else {
        echo "Tidak ada aturan pemakaian obat yang ditemukan.";
    }

    $conn->close();
} else {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
