<?php
include('../../connectDB/koneksi.php');

$id = $_POST['id'];
$jenis = $_POST['jenis'];
$biaya = $_POST['biaya'];

$sql = "UPDATE layanan SET jenis_layanan='$jenis', biaya='$biaya' WHERE idlayanan='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../index.php?hal=layanan");
} else {
    echo "Error updating record: " . $conn_error;
}   

$conn->close();
?>
