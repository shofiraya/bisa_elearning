<?php
include 'koneksi.php';


$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM unggah WHERE id='$id'");
$d = mysqli_fetch_array($data);
if(isset($_POST['kirim'])){
    $file=$_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    
    move_uploaded_file($file_tmp, 'file/' . $file);
    $query = "UPDATE mahasiswa SET files='$file' WHERE id='$id'";
   
        if (mysqli_query($conn, $query)) {
            echo "<script>window.location.href='upload.php?id=$id';</script>";
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Tautan ke jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container-lg">
    <br><br>
    <a  href="tampilanMahasiswa.php" >Kembali</a>
    <br><br>
    <form action="" enctype="multipart/form-data" method="post">
        <h3>Tugas Hari ini</h3><hr>
        <?php echo $d['Tugas']; ?><br>
        <br>
        <h3>Kirim Tugas</h3><hr><br>
        <input type="file" name="file" >
        <input type="submit" value="Kirim" name="kirim" >
    </form>
    <br><h3>Tugas Terkirim</h3><hr><br>
    <table class="table table-hover " >
		<tr class="table-secondary" align="center">
			<th>Tugas</th>
            <th>Ukuran</th>
            <th>Download</th>
		</tr>
		<tr >
            <td><?php echo $d['files']; ?></td>    
			<td align="center"><button class="btn btn-warning btn-sm"><?php echo round($d['size'] / 1024, 2); ?>KB</button></td>
            <td align="center"><a  href="download.php?filename=<?=$d['files']?>"><i class="fa-sharp fa-solid fa-download fa-lg" style="color: #1100ff;"></i></a></td>
		</tr>
			
	</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>