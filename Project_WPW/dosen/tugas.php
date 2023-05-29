<?php
session_start();
include '../koneksi.php';
$data = query("SELECT * FROM unggah");

if (!isset($_SESSION["login_dosen"])) {
    header("Location: ../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container">
        <h3 class="text-center mt-4">Form Input Tugas</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="tugas.php" class="btn btn-info mb-3">Kembali</a>
                <form method="post" action="up_tugas.php">
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Mata Kuliah</label>
                        <input type="text" class="form-control" name="matkul" placeholder="Masukkan Mata Kuliah">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Deskripsi Tugas</label>
                        <input type="text" class="form-control" name="tugas" placeholder="Masukkan Deskripsi Tugas">
                    </div>
                    <button type="submit" value="Simpan" name="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    
    <div class="container">
        <h2 class="text-center mt-5 mb-4">Tugas Kuliah</h2>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="dashboard_dosen.php" class="btn btn-danger mb-3">Kembali</a>
            <a href="up_tugas.php" class="btn btn-primary me-md-2 mb-3">+ Tambahkan Tugas</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Deskripsi Tugas</th>
                        <th scope="col">File</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $nomer = 1;
                    foreach ($data as $row) { 
                    ?>
                    <tr>
                        <th scope="row"><?php echo $nomer; ?></th>
                        <td><?php echo $row['matkul']; ?></td>
                        <td><?php echo $row['tugas']; ?></td>
                        <td><?php echo $row['file']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td>
                            <a href="nilai_tugas.php?id=<?php echo $row['tugas']; ?>" class="btn btn-primary btn-sm me-2">Beri Nilai</a>
                            <a href="download_tugas.php?filename=<?php echo $row['file']; ?>" class="btn btn-success btn-sm me-2">Download</a>
                        </td>
                    </tr>
                    <?php 
                    $nomer++;
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        })
    </script>
</body>
</html>
