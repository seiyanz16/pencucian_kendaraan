<?php
include('../../connectDB/koneksi.php');
$jenis = $_GET['jenis'];

$sql = "DELETE FROM layanan WHERE jenis_layanan = '" . $jenis . "'";

if ($conn->query($sql) === TRUE) {
?>
<script>
    window.location.replace('../index.php?hal=layanan');
    alert('Jenis Layanan = <?= $_GET['jenis'] ?> telah berhasil dihapus!')
</script>

<?php
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>