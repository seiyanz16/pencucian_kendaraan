<?php
include('../../connectDB/koneksi.php');

$id = $_POST['id'];
$jenis = $_POST['jenis'];
$biaya = $_POST['biaya'];

$sql = "UPDATE jenis_kendaraan SET jenis='$jenis', biaya='$biaya' WHERE idjkendaraan='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../index.php?hal=jkendaraan");
} else {
    echo "Error updating record: " . $conn_error;
}   

$conn->close();
?>
