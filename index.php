<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <title>Inventory Barang</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Inventory Barang</h1>
        <a href="add_item.php" class="btn btn-primary mb-3">Tambah Barang</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM barang";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['id_barang']; ?></td>
                    <td><?php echo $row['kode_barang']; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['jumlah_barang']; ?></td>
                    <td><?php echo $row['satuan_barang']; ?></td>
                    <td><?php echo $row['harga_beli']; ?></td>
                    <td><?php echo $row['status_barang'] ? 'Available' : 'Not Available'; ?></td>
                    <td>
                        <a href="use_item.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-warning btn-sm">Pakai</a>
                        <a href="increase_item.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-info btn-sm">Tambah</a>
                        <a href="update_item.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-success btn-sm">Update</a>
                        <a href="delete_item.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>
