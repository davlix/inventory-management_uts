<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <title>Pakai Barang</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Pakai Barang</h1>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM barang WHERE id_barang = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $jumlah_pakai = $_POST['jumlah_pakai'];
                if ($jumlah_pakai <= $row['jumlah_barang']) {
                    $jumlah_barang = $row['jumlah_barang'] - $jumlah_pakai;
                    $sql = "UPDATE barang SET jumlah_barang = $jumlah_barang WHERE id_barang = $id";
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Barang berhasil dipakai</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Jumlah pemakaian melebihi stok</div>";
                }
            }
        }
        ?>
        <form method="post">
            <div class="mb-3">
                <label for="jumlah_pakai" class="form-label">Jumlah Pakai</label>
                <input type="number" class="form-control" id="jumlah_pakai" name="jumlah_pakai" required>
            </div>
            <button type="submit" class="btn btn-primary">Pakai Barang</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>
