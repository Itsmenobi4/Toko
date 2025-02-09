<?php
require 'connect.php';

$produk = query("SELECT * FROM produk");

if (isset($_POST["cari"])) {
    $produk = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        .search-box {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px;
            width: 60%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 8px 15px;
            border: none;
            background: rgb(255, 255, 255);
            color: black;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: rgb(141, 171, 255);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Produk</h2>
        <form method="POST" class="search-box">
            <input type="text" name="keyword" placeholder="Cari produk...">
            <button type="submit" name="cari">Cari</button>
        </form>
        <table>
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Foto</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($produk as $row) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                    <button onclick="hapusProduk(<?= $row['id']; ?>)">
                        <img src="Sampah.jpeg" alt="g" width="60">
                    </button>
                </td>
                <td><?= $row["nama"]; ?></td>
                <td>Rp <?= number_format($row["harga"]); ?></td>
                <td><?= $row["stok"]; ?></td>
                <td><img src="<?= $row["foto"]; ?>" width="200"></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <script>
        function hapusProduk(id) {
            Swal.fire({
                title: 'Yakin mau hapus?',
                text: "Data ini ga bisa dibalikin lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'delete.php?id=' + id;
                }
            });
        }
    </script>
</body>
</html>