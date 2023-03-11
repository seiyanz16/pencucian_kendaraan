<?php
include('../../connectDB/koneksi.php');
$user = $_GET['username'];

$sql = "DELETE FROM user WHERE username = '" . $user . "'";

if ($conn->query($sql) === TRUE) {
?>
<script>
    window.location.replace('../index.php?hal=user');
    alert('Username = <?= $_GET['username'] ?> telah berhasil dihapus!')
</script>

<?php
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>