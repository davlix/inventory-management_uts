<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM barang WHERE id_barang = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Barang berhasil dihapus</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
header("Location: index.php");
?>
