<?php
include "config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Periksa keberadaan email dan token di database
    $sql = "SELECT * FROM member WHERE email='$email' AND token='$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email dan token valid, tampilkan formulir reset password
?><!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <!-- Memuat Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Atur Ulang Password Anda</h2>
        <form action="proses_reset_password_baru.php" method="post">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <div class="form-group">
                <label for="password">Password Baru:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Atur Ulang Password</button>
        </form>
    </div>

    <!-- Memuat Bootstrap JS (Opsional, tergantung dari kebutuhan Anda) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    } else {
        // Jika email atau token tidak valid
        echo "Link reset password tidak valid.";
    }
}
?>
