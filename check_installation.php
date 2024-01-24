<?php
// check_installation_date.php

// Ambil tanggal instalasi dari parameter GET
$insDate = $_GET['ins_date'];

// Lakukan koneksi ke database (gantilah dengan koneksi ke database Anda)
include 'koneksi.php';

// Query untuk menghitung jumlah tanggal instalasi yang sama
$query = "SELECT COUNT(*) as total FROM master_invoice WHERE ins_date = '$insDate'";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total = $row['total'];

    if ($total < 10) {
        echo "Tanggal pemasangan valid";
    } else {
        echo "Tanggal pemasangan penuh";
    }
} else {
    echo "Error in query";
}

// Tutup koneksi
$koneksi->close();
?>
