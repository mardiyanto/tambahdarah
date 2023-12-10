<?php
include "config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $token = $_POST['token'];
    $password = md5($_POST['password']); // Enkripsi password baru

    // Perbarui password dalam database
    $sql_update_password = "UPDATE member SET password='$password', token='',show_pass='$_POST[password]' WHERE email='$email' AND token='$token'";
    if ($conn->query($sql_update_password)) {
        echo "Password berhasil direset. Silakan login dengan password baru Anda.";
        // Redirect ke halaman login jika diperlukan
        // header("Location: login.php");
    } else {
        echo "Gagal mereset password.";
    }
}
?>
