<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM transaksi_penjualan WHERE id_transaksi = $id");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
</head>
<body>
    <h2>Form Edit Transaksi</h2>
    <form method="post">
        Tanggal: <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required><br><br>
        Nama Pelanggan: <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan'] ?>" required><br><br>
        Total Pembelian: <input type="number" name="total_pembelian" value="<?= $data['total_pembelian'] ?>" required><br><br>
        Metode Pembayaran:
        <select name="metode_pembayaran" required>
            <option <?= ($data['metode_pembayaran'] == 'Tunai') ? 'selected' : '' ?>>Tunai</option>
            <option <?= ($data['metode_pembayaran'] == 'Transfer') ? 'selected' : '' ?>>Transfer</option>
            <option <?= ($data['metode_pembayaran'] == 'E-Wallet') ? 'selected' : '' ?>>E-Wallet</option>
        </select><br><br>
        <input type="submit" name="update" value="Update">
    </form>

    <?php
    if (isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE transaksi_penjualan SET
            tanggal = '$_POST[tanggal]',
            nama_pelanggan = '$_POST[nama_pelanggan]',
            total_pembelian = $_POST[total_pembelian],
            metode_pembayaran = '$_POST[metode_pembayaran]'
            WHERE id_transaksi = $id
        ");
        header("Location: index.php");
    }
    ?>
</body>
</html>
