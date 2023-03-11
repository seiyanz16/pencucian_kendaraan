<?php
include('../../connectDB/koneksi.php');

$id = $_POST['id'];
$plat = $_POST['plat'];
$idjkendaraan = $_POST['idjkendaraan'];
$merk = $_POST['merk'];
$warna = $_POST['warna'];
$tgl_masuk = $_POST['tglmasuk'];
$tgl_keluar = $_POST['tglkeluar'];
$idcustomer = $_POST['idcustomer'];

$sql = "UPDATE kendaraan SET plat_nomor='$plat', idjkendaraan='$idjkendaraan', merk='$merk', warna='$warna', tgl_masuk='$tgl_masuk', tgl_keluar='$tgl_keluar', idcustomer='$idcustomer' WHERE idkendaraan=$id";

if ($conn->query($sql) === TRUE) {
    header("location: ../index.php?hal=dkendaraan");
} else {
    echo "Error updating record: " . $conn_error;
}   

$conn->close();
?>
