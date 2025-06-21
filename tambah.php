<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>
    <h2>Form Tambah Transaksi</h2>
    <form method="post">
        Tanggal: <input type="date" name="tanggal" required><br><br>
        Nama Pelanggan: <input type="text" name="nama_pelanggan" required><br><br>
        Total Pembelian: <input type="number" name="total_pembelian" required><br><br>
        Metode Pembayaran:
        <select name="metode_pembayaran" required>
            <option value="Tunai">Tunai</option>
            <option value="Transfer">Transfer</option>
            <option value="E-Wallet">E-Wallet</option>
        </select><br><br>
        <input type="submit" name="simpan" value="Simpan">
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $tanggal = $_POST['tanggal'];
        $nama = $_POST['nama_pelanggan'];
        $total = $_POST['total_pembelian'];
        $metode = $_POST['metode_pembayaran'];

        mysqli_query($conn, "INSERT INTO transaksi_penjualan (tanggal, nama_pelanggan, total_pembelian, metode_pembayaran)
        VALUES ('$tanggal', '$nama', $total, '$metode')");

        header("Location: index.php");
    }
    ?>
</body>
</html>
