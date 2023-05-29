<?php
include '../koneksi.php';

$matkul = ($_POST['matkul']);
$tugas = ( $_POST['tugas']);
$nilai = ($_POST['nilai']);

if (isset($_POST['submit'])) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'pdf','docx','doc','pptx','ppt');
    $namefile = $_FILES['file']['name'];
    $x = explode('.', $namefile);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
            move_uploaded_file($file_tmp, '../tugas/' . $namefile);
    } else {
        echo 'EKSTENSI FILE YANG DIUPLOAD TIDAK DIPERBOLEHKAN';
    }
}

// menginput data ke database
$query = "UPDATE unggah SET 
            matkul='$matkul', 
            tugas='$tugas', 
            file='$namefile', 
            nilai = '$nilai' 
            WHERE tugas='$tugas'";
mysqli_query($conn, $query);

if ($query) {
    echo '<p class="text-success">File berhasil diupload</p>';
} else {
    echo '<p class="text-danger">Gagal upload file</p>';
}

// mengalihkan halaman kembali ke nilai_tugas.php
header("location: nilai_tugas.php");
?>