<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM siswa WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Data tidak ditemukan.";
    exit();
}

$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 50px 20px;
        }
        .card {
            background-color: #ffffff;
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef0f2;
        }
        h4 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
            color: #333333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #6c757d;
            font-size: 14px;
        }
        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form-control:focus {
            outline: none;
            border-color: #80bdff;
        }
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }
        .btn {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            width: fit-content;
            text-align: left;
        }
        .btn-success { background-color: #28a745; color: white; }
        .btn-primary { background-color: #007bff; color: white; }
    </style>
</head>
<body>

<div class="card">
    <h4>Edit Data Siswa</h4>
    
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= htmlspecialchars($data['kelas']); ?>" required>
        </div>
        
        <div class="button-group">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-primary">Kembali</a>
        </div>
    </form>
</div>

</body>
</html>