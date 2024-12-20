<?php
require 'koneksi.php';

$email = $_POST["email"];
$password = $_POST["password"];

// Prepared statement untuk mencegah SQL Injection
$query_sql = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $query_sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Cek apakah user ditemukan
if ($row = mysqli_fetch_assoc($result)) {
    // Verifikasi password menggunakan password_verify
    if (password_verify($password, $row['password'])) {
        header("Location: beranda.html");
        exit;
    } else {
        echo "<center><h1>Email atau password anda salah. Silahkan coba login kembali.</h1>
              <button><strong><a href='index.html'>Login</a></strong></button></center>";
    }
} else {
    echo "<center><h1>Email atau password anda salah. Silahkan coba login kembali.</h1>
          <button><strong><a href='index.html'>Login</a></strong></button></center>";
}

// Tutup koneksi
mysqli_close($conn);
?>
