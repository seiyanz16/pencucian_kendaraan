<?php
include('../../connectDB/koneksi.php');
$user = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "SELECT * FROM user WHERE username = '" . $user . "'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
?>
<script>
    window.location = '../index.php?hal=user-create'
    alert('Data User baru yang anda masukkan sudah ada.'); 
</script>
<?php
exit();
} else {
    // echo "0 results";
    $sql = "INSERT INTO user (iduser, username, email, password) VALUES ('', '$user', '$email' ,'$password')";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.php?hal=user');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
?>