<?php
include('../../connectDB/koneksi.php');
$antrean = $_POST['antrean'];
$idcustomer = $_POST['idcustomer'];
$tglpendaftaran = $_POST['tgl_pendaftaran'];

$sql = "SELECT * FROM pendaftaran WHERE antrean = '" . $antrean . "'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
?>
<script>
    window.location = '../index.php?hal=pendaftaran-create'
    alert('Data Pendaftar baru yang anda masukkan sudah ada.'); 
</script>
<?php
exit();
} else {
    // echo "0 results";
    $sql = "INSERT INTO pendaftaran (idpendaftar, antrean, idcustomer, tgl_pendaftaran) VALUES ('', '$antrean', '$idcustomer' ,'$tglpendaftaran')";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.php?hal=pendaftaran');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
?>