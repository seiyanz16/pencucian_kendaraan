<?php
include('../../connectDB/koneksi.php');
$nama = $_GET['nama'];

$sql = "DELETE FROM customer WHERE nama = '" . $nama . "'";

if ($conn->query($sql) === TRUE) {
?>
<script>
    window.location.replace('../index.php?hal=customer');
    alert('Customer = <?= $_GET['nama'] ?> telah berhasil dihapus!')
</script>

<?php
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>