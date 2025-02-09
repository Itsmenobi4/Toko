<?php
require 'connect.php';

$id = $_GET['id'];
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $foto = $_POST["foto"];

    $query = "UPDATE produk SET nama='$nama', harga='$harga', stok='$stok', foto='$foto' WHERE id=$id";
    $conn->query($query);

    header("Location: index.php");
    exit;
}
?>