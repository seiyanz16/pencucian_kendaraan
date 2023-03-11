<?php
include('../../connectDB/koneksi.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$notelp = $_POST['notelp'];
$alamat = $_POST['alamat'];
$sql = "UPDATE customer SET nama='$nama', no_telp='$notelp', alamat='$alamat' WHERE idcustomer='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../index.php?hal=customer");
} else {
    echo "Error updating record: " . $conn_error;
}   

$conn->close();
?>
