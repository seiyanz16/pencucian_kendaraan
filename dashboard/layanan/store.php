<?php
include('../../connectDB/koneksi.php');
$jenis = $_POST['jenis'];
$biaya = $_POST['biaya'];
$sql = "SELECT * FROM layanan WHERE jenis_layanan = '" . $jenis . "'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
?>
<script>
    window.location = '../index.php?hal=layanan-create'
    alert('Data Jenis Layanan baru yang anda masukkan sudah ada.'); 
</script>
<?php
exit();
} else {
    // echo "0 results";
    $sql = "INSERT INTO layanan (idlayanan, jenis_layanan, biaya) VALUES ('', '$jenis', '$biaya')";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.php?hal=layanan');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
?>