<?php
session_start();
if (!isset($_SESSION["login_dosen"])) {
    header("Location: login.php");
    exit;
}

include '../koneksi.php';



if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $queryshow = "SELECT * FROM upload WHERE materi='$id'";
    $sqlshow = mysqli_query($conn, $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);
    
    unlink("../berkas/".$result['file']);
    

    $query = "DELETE FROM upload WHERE materi='$id'";
    $sql = mysqli_query($conn, $query);

    if($sql) {
        header("Location:materi.php");
    } else {
        echo $query;
    }
}

?>