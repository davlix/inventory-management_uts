<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <title>Tambah Barang</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Tambah Barang</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $jumlah_barang = $_POST['jumlah_barang'];
            $satuan_barang = $_POST['satuan_barang'];
            $harga_beli = $_POST['harga_beli'];
            $status_barang = isset($_POST['status_barang']) ? 1 : 0;

            $sql = "INSERT INTO barang (kode_barang, nama_barang, jumlah_barang, satuan_barang, harga_beli, status_barang) VALUES ('$kode_barang', '$nama_barang', $jumlah_barang, '$satuan_barang', $harga_beli, $status_barang)";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Barang berhasil ditambahkan</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }
        ?>
        <form method="post">
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
            </div>
            <div class="mb-3">
                <label for="satuan_barang" class="form-label">Satuan</label>
                <select class="form-control" id="satuan_barang" name="satuan_barang">
                    <option value="kg">Kg</option>
                    <option value="pcs">Pcs</option>
                    <option value="liter">Liter</option>
                    <option value="meter">Meter</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="status_barang" name="status_barang">
                <label class="form-check-label" for="status_barang">
                    Available
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Barang</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>
