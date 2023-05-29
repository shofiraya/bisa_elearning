<?php
include '../koneksi.php';

//menangkap data yang dikirim dari form
$matkul = $_POST['matkul'];
$tugas = $_POST['tugas'];
$namefile = $_POST['file'];
$nilai = $_POST['nilai'];

mysqli_query($conn, "INSERT INTO unggah VALUES('','$matkul','$tugas','$namefile', '$nilai')");


// mengalihkan halaman kembali ke tugas.php
header("location: tugas.php");
?>

