<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbpkendaraan";

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbpkendaraan");

//cek koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>