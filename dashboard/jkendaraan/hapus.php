<?php
include('../../connectDB/koneksi.php');
$jenis = $_GET['jenis'];

$sql = "DELETE FROM jenis_kendaraan WHERE jenis = '" . $jenis . "'";

if ($conn->query($sql) === TRUE) {
?>
<script>
    window.location.replace('../index.php?hal=jkendaraan');
    alert('Jenis Kendaraan = <?= $_GET['jenis'] ?> telah berhasil dihapus!')
</script>

<?php
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>