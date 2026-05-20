<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $stmt = $conn->prepare("INSERT INTO siswa (nama, kelas) VALUES (?, ?)");
    $stmt->bind_param("ss", $nama, $kelas);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>