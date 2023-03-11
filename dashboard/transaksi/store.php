<?php
include('../../connectDB/koneksi.php');
$nonota = $_POST['no_nota'];
$idcustomer = $_POST['idcustomer'];
$idjkendaraan = $_POST['idjkendaraan'];
$idlayanan = $_POST['idlayanan'];
$metodebayar = $_POST['metodebayar'];
$tgl = $_POST['tgl'];
$catatan = $_POST['catatan'];

$sql = "SELECT * FROM transaksi WHERE no_nota = '" . $nonota . "'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
?>
<script>
    window.location = '../index.php?hal=transaksi-create'
    alert('Data Transaksi baru yang anda masukkan sudah ada.'); 
</script>
<?php
exit();
} else {
    // echo "0 results";
    $sql = "INSERT INTO transaksi (idtransaksi, no_nota, idcustomer, idlayanan, total_bayar, metode_bayar, tgl_transaksi, catatan, idjkendaraan) VALUES ('', '$nonota', '$idcustomer' ,'$idlayanan','','$metodebayar','$tgl','$catatan','$idjkendaraan')";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.php?hal=transaksi');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
?>