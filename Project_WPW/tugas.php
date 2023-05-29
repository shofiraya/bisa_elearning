<?php
        include 'koneksi.php';  

        if (isset($_POST['submit'])) {
            $ekstensi_diperbolehkan = array('png','jpg','jpeg','pdf','docx','ppt');
            $namegambar = $_FILES['file']['name'];
            $x = explode('.', $namegambar);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];	
    
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 2000000) {			
                    move_uploaded_file($file_tmp, 'tugas/'.$namegambar);
                    $query = mysqli_query($conn,"insert into unggah values('','$namegambar')");
                    if ($query) {
                        echo '<p class="text-success">File berhasil diupload</p>';
                    } else {
                        echo '<p class="text-danger">Gagal upload file</p>';
                    }
                } else {
                    echo '<p class="text-danger">Ukuran file terlalu besar</p>';
                }
            } else {
                echo '<p class="text-danger">Ekstensi file yang diupload tidak diperbolehkan</p>';
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload dan Download File</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        .container {
            border: 1px solid black;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Form Upload File</h3>
        <form action="hasil_upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Upload file:</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <h2 class="text-center">Tabel Hasil Upload dan Download</h2>
        <a href="tugas.php" class="btn btn-primary mb-3">Tambahkan File</a>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 30px">No</th>
                    <th>Nama File</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM unggah";
                $data = mysqli_query($conn, $sql);
                $nomer = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $nomer++ ?></td>
                    <td>
                        <?php echo $d['file']; ?>
                    </td>
                    <td>
                        <a href="download.php?filename=<?=$d['file']?>" class="btn btn-success btn-sm me-2">Download</a>
                    </td>		
                </tr>
                <?php } ?>      
            </tbody>
        </table>
    </div>
</body>
</html>