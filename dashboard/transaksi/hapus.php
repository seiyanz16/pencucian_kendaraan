<?php
include('../../connectDB/koneksi.php');
$nonota = $_GET['no_nota'];

$sql = "DELETE FROM transaksi WHERE no_nota = '" . $nonota . "'";

if ($conn->query($sql) === TRUE) {
?>
<script>
    window.location.replace('../index.php?hal=transaksi');
    alert('Transaksi No Nota = <?= $_GET['no_nota'] ?> telah berhasil dihapus!')
</script>

<?php
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>