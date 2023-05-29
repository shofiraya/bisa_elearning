<?php
session_start();
if (!isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';



if(isset($_GET['tugas'])) {
    $id = $_GET['tugas'];
    $queryshow = "SELECT * FROM unggah WHERE tugas='$id'";
    $sqlshow = mysqli_query($conn, $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);
    
    unlink("../tugas/".$result['file']);
    

    $query = "DELETE FROM unggah WHERE tugas='$id'";
    $sql = mysqli_query($conn, $query);

    if($sql) {
        header("Location: tugasku.php");
    } else {
        echo $query;
    }
}

?>