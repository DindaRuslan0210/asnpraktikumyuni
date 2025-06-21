<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi Penjualan</title>
</head>
<body>
    <h2>Data Transaksi Penjualan</h2>
    <a href="tambah.php">+ Tambah Transaksi</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Total Pembelian</th>
            <th>Metode Pembayaran</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM transaksi_penjualan");
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$data['tanggal']}</td>
                <td>{$data['nama_pelanggan']}</td>
                <td>Rp ".number_format($data['total_pembelian'],0,",",".")."</td>
                <td>{$data['metode_pembayaran']}</td>
                <td>
                    <a href='edit.php?id={$data['id_transaksi']}'>Edit</a> |
                    <a href='hapus.php?id={$data['id_transaksi']}' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
