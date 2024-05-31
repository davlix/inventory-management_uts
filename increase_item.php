<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <title>Tambah Jumlah Barang</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Tambah Jumlah Barang</h1>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM barang WHERE id_barang = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $jumlah_tambah = $_POST['jumlah_tambah'];
                $jumlah_barang = $row['jumlah_barang'] + $jumlah_tambah;
                $sql = "UPDATE barang SET jumlah_barang = $jumlah_barang WHERE id_barang = $id";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>Jumlah barang berhasil ditambahkan</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                }
            }
        }
        ?>
        <form method="post">
            <div class="mb-3">
                <label for="jumlah_tambah" class="form-label">Jumlah Tambah</label>
                <input type="number" class="form-control" id="jumlah_tambah" name="jumlah_tambah" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Jumlah</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>
