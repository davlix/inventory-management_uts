<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <title>Update Barang</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update Barang</h1>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM barang WHERE id_barang = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $kode_barang = $_POST['kode_barang'];
                $nama_barang = $_POST['nama_barang'];
                $jumlah_barang = $_POST['jumlah_barang'];
                $satuan_barang = $_POST['satuan_barang'];
                $harga_beli = $_POST['harga_beli'];
                $status_barang = isset($_POST['status_barang']) ? 1 : 0;

                $sql = "UPDATE barang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', jumlah_barang = $jumlah_barang, satuan_barang = '$satuan_barang', harga_beli = $harga_beli, status_barang = $status_barang WHERE id_barang = $id";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>Barang berhasil diupdate</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                }
            }
        }
        ?>
        <form method="post">
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?php echo $row['kode_barang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo $row['jumlah_barang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="satuan_barang" class="form-label">Satuan</label>
                <select class="form-control" id="satuan_barang" name="satuan_barang">
                    <option value="kg" <?php if($row['satuan_barang'] == 'kg') echo 'selected'; ?>>Kg</option>
                    <option value="pcs" <?php if($row['satuan_barang'] == 'pcs') echo 'selected'; ?>>Pcs</option>
                    <option value="liter" <?php if($row['satuan_barang'] == 'liter') echo 'selected'; ?>>Liter</option>
                    <option value="meter" <?php if($row['satuan_barang'] == 'meter') echo 'selected'; ?>>Meter</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo $row['harga_beli']; ?>" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="status_barang" name="status_barang" <?php if($row['status_barang']) echo 'checked'; ?>>
                <label class="form-check-label" for="status_barang">
                    Available
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Update Barang</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>
