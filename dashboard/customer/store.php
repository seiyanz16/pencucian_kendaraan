<?php
include('../../connectDB/koneksi.php');
$nama = $_POST['nama'];
$notelp = $_POST['notelp'];
$alamat = $_POST['alamat'];
$sql = "SELECT * FROM customer WHERE nama = '" . $nama . "'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
?>
<script>
    window.location = '../index.php?hal=customer-create'
    alert('Data Customer baru yang anda masukkan sudah ada.'); 
</script>
<?php
exit();
} else {
    // echo "0 results";
    $sql = "INSERT INTO customer (idcustomer, nama, no_telp, alamat) VALUES ('', '$nama', '$notelp' ,'$alamat')";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.php?hal=customer');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
?>