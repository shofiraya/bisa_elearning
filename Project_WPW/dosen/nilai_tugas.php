<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["login_dosen"])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['tugas'];
//untuk mengambil data mahasiswa.
$sql = mysqli_query($conn, "SELECT * FROM unggah WHERE tugas='$id'");
//menyimpan data mahasiswa melalui mysql 
$d = mysqli_fetch_array($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="text-center mt-4">Form Beri Nilai Tugas</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="tugas.php" class="btn btn-info mb-3">Kembali</a>
                <form method="post" action="upnilai_tugas.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="matkul" class="form-label">Mata Kuliah</label>
                        <input type="text" name="matkul" value="<?php echo $d["matkul"]; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tugas" class="form-label">Deskripsi Tugas</label>
                        <input type="text" name="tugas" value="<?php echo $d["tugas"]; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload Tugas</label> <br />
                        <?php echo $d['file']; ?> <br> <br>
                        <input type="file" class="form-control" name="file" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tugas" class="form-label">Nilai</label>
                        <input type="text" name="nilai" value="<?php echo $d["nilai"]; ?>">
                    </div>
                    <button type="submit" value="Simpan" name="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>