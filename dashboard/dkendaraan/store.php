<?php
include('../../connectDB/koneksi.php');
$idjenis = $_POST['idjkendaraan'];
$plat = $_POST['plat'];
$merk = $_POST['merk'];
$warna = $_POST['warna'];
$tglmasuk = $_POST['tgl_masuk'];
$tglkeluar = $_POST['tgl_keluar'];
$idcustomer = $_POST['idcustomer'];

$sql = "SELECT * FROM kendaraan WHERE plat_nomor = '" . $plat . "'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
?>
<script>
    window.location = '../index.php?hal=dkendaraan-create'
    alert('Data Kendaraan baru yang anda masukkan sudah ada.'); 
</script>
<?php
exit();
} else {
    // echo "0 results";
    $sql = "INSERT INTO kendaraan (idkendaraan, idjkendaraan, plat_nomor, merk, warna ,tgl_masuk, tgl_keluar, idcustomer) VALUES ('', '$idjenis', '$plat' ,'$merk','$warna','$tglmasuk', '$tglkeluar', '$idcustomer'  )";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.php?hal=dkendaraan');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
?>