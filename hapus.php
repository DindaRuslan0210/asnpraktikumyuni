<?php
include 'koneksi.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM transaksi_penjualan WHERE id_transaksi = $id");

header("Location: index.php");
?>
