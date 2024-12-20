<?php
// Koneksi ke database
include('koneksi.php');

// Pastikan data dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $method = $_POST['method'];
    $total = $_POST['total'];
    $address = isset($_POST['address']) ? $_POST['address'] : null;
    $card_name = isset($_POST['card_name']) ? $_POST['card_name'] : null;
    $card_number = isset($_POST['card_number']) ? $_POST['card_number'] : null;
    $expiry = isset($_POST['expiry']) ? $_POST['expiry'] : null;
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : null;

    // Validasi input
    if (empty($method) || empty($total)) {
        die("Metode pembayaran dan total tidak boleh kosong!");
    }

    // Persiapkan query untuk memasukkan data ke database
    $sql = "INSERT INTO transactions (method, total, address, card_name, card_number, expiry, cvv) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssss", $method, $total, $address, $card_name, $card_number, $expiry, $cvv);

    if ($stmt->execute()) {
        // Jika berhasil, arahkan ke halaman beranda
        header("Location: beranda.html");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    echo "Metode pengiriman data tidak valid.";
}
