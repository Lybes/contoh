<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas Baru</title>
    <style>
        .table-content {
            border: 1px solid black;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php
    include "koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isi_tugas   = $_POST["isi_tugas"];
    

    $sql = "INSERT INTO todolist (isi_tugas) VALUES ('$isi_tugas')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }
    mysqli_close($conn);
    ?>
    <h2 style="text-align:center">Tambah Tugas</h2>
 <form method="POST" action="">
    <label>Tugas Baru</label>
    <input type="text" name="isi_tugas" required>

    <input type="submit" value="Simpan">
  </form>
</body>
</html>