<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $matkul = $_POST['matkul'];
    $materi = $_POST['materi'];
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'pdf');
    $namefile = $_FILES['file']['name'];
    $x = explode('.', $namefile);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
        if ($ukuran < 2000000) {
            move_uploaded_file($file_tmp, '../materi/' . $namefile);
            // menginput data ke database
            $query = mysqli_query($conn, "INSERT INTO upload VALUES('','$matkul', '$materi', '$namefile')");
            if ($query) {
                echo '<p class="text-success">File berhasil diupload</p>';
            } else {
                echo '<p class="text-danger">Gagal upload file</p>';
            }
        } else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DIUPLOAD TIDAK DIPERBOLEHKAN';
    }
}

// mengalihkan halaman kembali ke materi.php
header("location: materi.php");
?>

