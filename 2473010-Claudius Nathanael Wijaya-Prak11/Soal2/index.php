<?php
include 'koneksi.php';
$query = "SELECT * FROM siswa";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 50px 20px;
        }
        .card {
            background-color: #ffffff;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef0f2;
        }
        h3 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
            color: #333333;
        }
        .mb-3 {
            margin-bottom: 15px;
        }
        /* Style Tombol */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            text-align: center;
        }
        .btn-success { background-color: #28a745; color: white; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-danger { background-color: #dc3545; color: white; }
        
        .btn-sm {
            padding: 5px 12px;
            font-size: 13px;
        }
        /* Style Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: center;
            color: #495057;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #212529;
        }
        .text-start {
            text-align: left;
            padding-left: 15px;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }
    </style>
</head>
<body>

<div class="card">
    <h3>Data Siswa</h3>
    
    <div class="mb-3">
        <a href="tambah.php" class="btn btn-success">Tambah Data</a>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 10%;">ID</th>
                <th style="width: 45%;" class="text-start">Nama</th>
                <th style="width: 20%;">Kelas</th>
                <th style="width: 25%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td class="text-start"><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['kelas']); ?></td>
                    <td>
                        <div class="action-buttons">
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="color: #6c757d; padding: 20px;">Belum ada data siswa.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>