<?php
include('../../connectDB/koneksi.php');
$antrean = $_GET['antrean'];

$sql = "DELETE FROM pendaftaran WHERE antrean = '" . $antrean . "'";

if ($conn->query($sql) === TRUE) {
?>
<script>
    window.location.replace('../index.php?hal=pendaftaran');
    alert('Pendaftar antrean = <?= $_GET['antrean'] ?> telah berhasil dihapus!')
</script>

<?php
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>