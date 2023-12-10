
<?php
    // Include file koneksi.php
include 'config/koneksi.php';
if ($_GET['t'] == 'lupa') {
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Lupa Password</title>
        <!-- Memuat Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Masukkan Email untuk Mereset Password</h2>
            <form action="lupa.php?t=reset" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    
        <!-- Memuat Bootstrap JS (Opsional, tergantung dari kebutuhan Anda) -->
        <script src="aset/bootstrap.js"></script>
    </body>
    </html>';
}
elseif ($_GET['t'] == 'reset') {

// Include PHPMailer autoloader
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Periksa apakah email ada di database
    $sql = "SELECT * FROM member WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email ditemukan, lakukan proses reset password
        // Generate token reset password
        $token = bin2hex(openssl_random_pseudo_bytes(32)); // Contoh: menghasilkan token acak

        // Simpan token di database
        $sql_update_token = "UPDATE member SET token='$token' WHERE email='$email'";
        $conn->query($sql_update_token);

        // Kirim email ke pengguna dengan tautan reset password
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Ganti dengan host SMTP Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'mardybest@ibnus.ac.id'; // Ganti dengan email pengirim
        $mail->Password = 'buda atny ysmy msgr'; // Ganti dengan password email pengirim
        $mail->Port = 587; // Port SMTP (biasanya 587)
        $mail->SMTPSecure = 'tls'; // Jenis enkripsi (tls/ssl)

        // Siapkan email
        $mail->setFrom('mardybest@ibnus.ac.id', 'Mardiyanto');
        $mail->addAddress($email);
        $mail->Subject = 'Reset Password';
        $mail->isHTML(true);
        $mail->Body = 'Silakan klik tautan berikut untuk mereset password: <a href="' . $url . 'reset_password.php?email=' . $email . '&token=' . $token . '">Reset Password</a>';


        if ($mail->send()) {
            // Jika email terkirim, arahkan ke halaman konfirmasi
            header("Location: lupa.php?t=kirim");
        } else {
            // Jika terjadi kesalahan dalam pengiriman email
            echo 'Email tidak dapat dikirim. Kesalahan: ' . $mail->ErrorInfo;
        }
    } else {
        // Jika email tidak ditemukan
        echo "Email tidak ditemukan dalam database.";
    }
}
} 

elseif ($_GET['t'] == 'kirim') {
    echo"<!DOCTYPE html>
    <html>
    <head>
        <title>Konfirmasi Reset Password</title>
    </head>
    <body>
        <h2>Email telah dikirim untuk mereset password.<a href='$url'>kembali</a></h2>
        <!-- Tambahkan pesan atau instruksi lebih lanjut di sini -->
    </body>
    </html> ";
}
elseif ($_GET['t'] == 'passbaru') {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $email = $_GET['email'];
        $token = $_GET['token'];
    
        // Periksa keberadaan email dan token di database
        $sql = "SELECT * FROM member WHERE email='$email' AND token='$token'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // Email dan token valid, tampilkan formulir reset password
   
    echo"<!DOCTYPE html>
    <html>
    <head>
        <title>Reset Password</title>
        <!-- Memuat Bootstrap CSS -->
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class='container mt-5'>
            <h2>Atur Ulang Password Anda</h2>
            <form action='lupa.php?t=respass' method='post'>
                <input type='hidden' name='email' value='$email'>
                <input type='hidden' name='token' value='$token'>
                <div class='form-group'>
                    <label for='password'>Password Baru:</label>
                    <input type='password' id='password' name='password' class='form-control' required>
                </div>
                <button type='submit' class='btn btn-primary'>Atur Ulang Password</button>
            </form>
        </div>
    
        <!-- Memuat Bootstrap JS (Opsional, tergantung dari kebutuhan Anda) -->
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
    </body>
    </html>";
} else {
    // Jika email atau token tidak valid
    echo "Link reset password tidak valid.";
}
}
}
elseif ($_GET['t'] == 'respass') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $token = $_POST['token'];
        $password = md5($_POST['password']); // Enkripsi password baru
    
        // Perbarui password dalam database
        $sql_update_password = "UPDATE member SET password='$password', token='',show_pass='$_POST[password]' WHERE email='$email' AND token='$token'";
        if ($conn->query($sql_update_password)) {
            echo "Password berhasil direset. Silakan login dengan password baru Anda. <a href='$url'>login</a>";
            // Redirect ke halaman login jika diperlukan
            // header("Location: login.php");
        } else {
            echo "Gagal mereset password.";
        }
    }
}
?>


