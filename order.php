<?php
// order.php

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "toko_online");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari request
$product_name = $_POST['product_name'];
$price = $_POST['price'];

// Query untuk memasukkan data pembelian ke dalam database
$sql = "INSERT INTO orders (product_name, price) VALUES ('$product_name', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "Pembelian berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
