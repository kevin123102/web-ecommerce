<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Toko Online</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
        <p>Anda berhasil login ke akun Anda.</p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
