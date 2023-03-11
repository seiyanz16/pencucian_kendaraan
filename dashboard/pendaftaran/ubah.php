<?php
include('../../connectDB/koneksi.php');

$id = $_POST['id'];
$antrean = $_POST['antrean'];
$idcustomer = $_POST['idcustomer'];
$tglpendaftaran = $_POST['tgl_pendaftaran'];

$sql = "UPDATE pendaftaran SET antrean='$antrean', idcustomer='$idcustomer', tgl_pendaftaran='$tglpendaftaran' WHERE idpendaftar='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../index.php?hal=pendaftaran");
} else {
    echo "Error updating record: " . $conn_error;
}   

$conn->close();
?>
