<?php
include "koneksi.php";

if (isset($_GET['id_tugas']) && !empty($_GET['id_tugas'])) {
    $id_tugas = mysqli_real_escape_string($conn, $_GET['id_tugas']);
    
    $sql = "DELETE FROM todolist WHERE id_tugas = '$id_tugas'";
    
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            header("Location: index.php?status=deleted");
            exit();
        } else {
            header("Location: index.php?status=not_found");
            exit();
        }
    } else {
        header("Location: index.php?status=error&message=" . urlencode(mysqli_error($conn)));
        exit();
    }
} else {
    header("Location: index.php?status=invalid_id");
    exit();
}

mysqli_close($conn);
?>
