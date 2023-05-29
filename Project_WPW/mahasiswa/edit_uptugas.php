<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $tugas = $_POST['tugas'];
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'pdf','docx','doc','pptx','ppt');
    $namefile = $_FILES['file']['name'];
    $x = explode('.', $namefile);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
            move_uploaded_file($file_tmp, '../tugas/' . $namefile);
            // menginput data ke database
            $query = "UPDATE unggah SET file='$namefile' WHERE tugas='$tugas'";
            mysqli_query($conn, $query);

            if ($query) {
                echo '<p class="text-success">File berhasil diupload</p>';
            } else {
                echo '<p class="text-danger">Gagal upload file</p>';
            }
    } else {
        echo 'EKSTENSI FILE YANG DIUPLOAD TIDAK DIPERBOLEHKAN';
    }
}

// mengalihkan halaman kembali ke tugas.php
header("location: tugasku.php");
?>