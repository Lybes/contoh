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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="w-full flex items-center justify-between gap-4 rounded-lg bg-white p-6 shadow-md outline outline-black/5 dark:bg-gray-800">
        <h1 class="text-white font-bold text-5xl">Tambah Tugas</h1>
    </div>
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
    <table class="my-15 w-auto table-fixed border-2 text-center m-auto shadow-2xl">
        <tr>
            <td>
                <form method="POST" action="">
                <label>Tugas Baru :</label>
                <input type="text" name="isi_tugas" required>

                <button type="submit" class="bg-blue-900 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </form>
            </td>
        </tr>
    </table>
 
</body>
</html>