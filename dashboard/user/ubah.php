<?php
include('../../connectDB/koneksi.php');

$id = $_POST['id'];
$user = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "UPDATE user SET username='$user', email='$email', password='$password' WHERE iduser='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../index.php?hal=user");
} else {
    echo "Error updating record: " . $conn_error;
}   

$conn->close();
?>
