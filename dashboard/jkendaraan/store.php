<?php
include('../../connectDB/koneksi.php');
$jenis = $_POST['jenis'];
$biaya = $_POST['biaya'];
$sql = "SELECT * FROM jenis_kendaraan WHERE jenis = '" . $jenis . "'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
?>
<script>
    window.location = '../index.php?hal=jkendaraan-create'
    alert('Data Jenis Kendaraan baru yang anda masukkan sudah ada.'); 
</script>
<?php
exit();
} else {
    // echo "0 results";
    $sql = "INSERT INTO jenis_kendaraan (idjkendaraan, jenis, biaya) VALUES ('', '$jenis', '$biaya')";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.php?hal=jkendaraan');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
?>