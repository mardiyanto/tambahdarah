<?php

session_start();
if (!(isset($_SESSION['user']) && isset($_SESSION['pass']))) {
    header('location:index.php');
    exit();
} else {
?>

<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus tambahttd
if ($module=='obat' AND $act=='hapus'){
  mysqli_query($conn,"DELETE FROM aturan_pemakaian_obat WHERE id_aturan='$_GET[id]'");
  header('location:../../index.php?module=obat');
}

// Input tambahttd
elseif ($module=='obat' AND $act=='input'){
    $nama_obat = $_POST['nama_obat'];
    $dosis = $_POST['dosis'];
    $waktu = $_POST['waktu'];
    $durasi_hari = $_POST['durasi_hari'];
    $id_user =$_SESSION['id_member'];
    // Tambahkan aturan pemakaian obat ke dalam tabel aturan_pemakaian_obat
    $sql = "INSERT INTO aturan_pemakaian_obat (id_member,nama_obat, dosis, waktu, durasi_hari) VALUES ('$id_user', '$nama_obat', '$dosis', '$waktu', '$durasi_hari')";

    if ($conn->query($sql) === TRUE) {
        header('location:../../index.php?module=obat');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update tambahttd
elseif ($module=='obat' AND $act=='update'){
  mysqli_query($conn,"UPDATE aturan_pemakaian_obat SET
          nama_obat = '$_POST[nama_obat]', dosis = '$_POST[dosis]' WHERE id_aturan = '$_POST[id]'");
  header('location:../../index.php?module=obat');
 }
 // Update tambahttd
elseif ($module=='obat' AND $act=='inputjadwal'){
    $sql = "SELECT * FROM aturan_pemakaian_obat WHERE id_aturan = '$_GET[id_aturan]'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_aturan = $row['id_aturan'];
            $durasi_hari = $row['durasi_hari'];
            $waktu = $row['waktu'];

            $tanggal_sekarang = date('Y-m-d');
            $tanggal_akhir = date('Y-m-d', strtotime('+' . $durasi_hari . ' days', strtotime($tanggal_sekarang)));

            while (strtotime($tanggal_sekarang) < strtotime($tanggal_akhir)) {
                $sql_insert_jadwal = "INSERT INTO jadwal_pemakaian_obat (id_aturan, tanggal, waktu, status) 
                VALUES ('$id_aturan', '$tanggal_sekarang', '$waktu', 'belum')";
                $result_insert = $conn->query($sql_insert_jadwal);
                // Update jadwal sudah
                mysqli_query($conn,"UPDATE aturan_pemakaian_obat SET
                jadwal = '1' WHERE id_aturan = '$_GET[id_aturan]'");
                if (!$result_insert) {
                    echo "Error: " . $sql_insert_jadwal . "<br>" . $conn->error;
                }

                $tanggal_sekarang = date('Y-m-d', strtotime('+1 day', strtotime($tanggal_sekarang)));
            }
        }
        echo "<script>window.alert('Jadwal pemakaian obat berhasil dibuat untuk satu bulan.');
        window.location=('../../obat/jadwalobat')</script>";
    } else {
        echo "Tidak ada aturan pemakaian obat yang ditemukan.";
    }
    echo "<script>window.alert('Jadwal pemakaian obat berhasil dibuat untuk satu bulan.');
        window.location=('../../obat/jadwalobat')</script>";
   }
 // Update tambahttd
elseif ($module=='obat' AND $act=='updatejadwal'){
    mysqli_query($conn,"UPDATE jadwal_pemakaian_obat SET
            status = 'sudah' WHERE id_jadwal = '$_GET[id_jadwal]'");
    echo "<script>window.alert('Jadwal pemakaian obat berhasil di update');
    window.location=('../../obat/jadwalobat')</script>";
   }
?>
<?php } ?>