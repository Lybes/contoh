<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tugas = mysqli_real_escape_string($conn, $_POST['id_tugas']);
    $isi_tugas = mysqli_real_escape_string($conn, $_POST['isi_tugas']);
    
    $sql = "UPDATE todolist SET isi_tugas = '$isi_tugas' WHERE id_tugas = '$id_tugas'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?status=updated");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: index.php");
    exit();
}

mysqli_close($conn);
?>
