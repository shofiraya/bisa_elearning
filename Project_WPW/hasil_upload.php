<?php
    include 'koneksi.php';  

    if(isset($_POST['submit'])){
        $tugas = $_POST ['tugas'];
        $ekstensi_diperbolehkan	= array('png','jpg','jpeg', 'pdf');
        $namefile = $_FILES['file']['name'];
        $x = explode('.', $namefile);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];	
        
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 2000000){			
                move_uploaded_file($file_tmp, 'materi/'.$namefile);
                //menginput data ke database
                $query = mysqli_query($conn,"insert into unggah (file, tugas) values('','$namefile', '$tugas')");
                if ($query) {
                    echo '<p class="text-success">File berhasil diupload</p>';
                } else {
                    echo '<p class="text-danger">Gagal upload file</p>';
                }
            }else{
                echo 'UKURAN FILE TERLALU BESAR';
            }
        }else{
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
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
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Tugas hari ini</h3>
            
            <br><br>
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
        
        <a href="tugas.php" class="btn btn-primary mb-3">Berikan Nilai</a>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 30px">No</th>
                    <th>Tugas</th>
                    <th>Download</th>
                    <th>Nilai</th>
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