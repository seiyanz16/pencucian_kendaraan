<?php
include('../../connectDB/koneksi.php');

$id = $_POST['id'];
$nonota = $_POST['no_nota'];
$idcustomer = $_POST['idcustomer'];
$idjenis = $_POST['idjkendaraan'];
$idlayanan = $_POST['idlayanan'];
$totalbayar = $_POST['totalbayar'];
$metodebayar = $_POST['metodebayar'];
$tgl = $_POST['tgl'];
$catatan = $_POST['catatan'];

$sql = "UPDATE transaksi SET no_nota='$nonota', idcustomer='$idcustomer', idjkendaraan='$idjenis', idlayanan='$idlayanan', total_bayar='$totalbayar', metode_bayar='$metodebayar', tgl_transaksi='$tgl', catatan='$catatan' WHERE idtransaksi='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../index.php?hal=transaksi");
} else {
    echo "Error updating record: " . $conn_error;
}   

$conn->close();
?>
