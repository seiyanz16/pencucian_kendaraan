<?php
include('../../connectDB/koneksi.php');
$plat = $_GET['plat_nomor'];

$sql = "DELETE FROM kendaraan WHERE plat_nomor = '" . $plat . "'";

if ($conn->query($sql) === TRUE) {
?>
<script>
    window.location.replace('../index.php?hal=dkendaraan');
    alert('Data Kendaraan dengan Plat = <?= $_GET['plat_nomor'] ?> telah berhasil dihapus!')
</script>

<?php
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>