<?php
include "koneksi.php";

if (isset($_GET['id_tugas']) && !empty($_GET['id_tugas'])) {
    $id_tugas = mysqli_real_escape_string($conn, $_GET['id_tugas']);
    
    $sql = "SELECT * FROM todolist WHERE id_tugas = '$id_tugas'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $isi_tugas = $row['isi_tugas'];
    } else {
        echo "Data Tugas tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tugas tidak valid.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Isi Tugas</title>
    <!-- <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="w-full flex items-center justify-between gap-4 rounded-lg bg-white p-6 shadow-md outline outline-black/5 dark:bg-gray-800">
        <h1 class="text-white font-bold text-5xl">Edit Tugas</h1>
    </div>
    <div class="max-w-lg mx-auto mt-10">

    <form action="prosesedit.php" method="POST" class="bg-white shadow rounded-lg p-6">
        <!-- Hidden input untuk id tugas -->
        <input type="hidden" name="id_tugas" value="<?php echo $id_tugas; ?>">

        <!-- Input isi tugas -->
        <label for="isi_tugas" class="block font-bold mb-2">Isi Tugas:</label>
        <input 
            type="text" 
            id="isi_tugas" 
            name="isi_tugas" 
            value="<?php echo htmlspecialchars($isi_tugas); ?>" 
            required
            class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <!-- Tombol update -->
        <input 
            type="submit" 
            value="Update Tugas" 
            class="bg-blue-900 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded cursor-pointer"
        >
    </form>
</div>

</body>
</html>
