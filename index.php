<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            overflow: auto;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
        }
        .navbar a:hover {
            color: black;
            
        }

        .table-content {
            border: 1px solid black;
            width: 100%;
            text-align: center;
        }
    </style> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="w-full">


    <!-- Navbar -->
     <div class="w-full flex items-center justify-between gap-4 rounded-lg bg-white p-6 shadow-md outline outline-black/5 dark:bg-gray-800">
        <h1 class="text-white font-bold text-5xl">To Do List</h1>
        <a href="tambah.php" class="text-white hover:text-gray-500" >Tambah Tugas +</a>
     </div>
     
     <div>
        <table class="w-full table-fixed border-2 text-center m-auto shadow-2xl">
            <thead>
                <tr>
                    <th>Tugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $sql = "SELECT id_tugas, isi_tugas FROM todolist";
            $result = mysqli_query($conn, $sql);

            echo "<h2 class='text-center font-bold text-3xl my-2'>List Tugas</h2>";
            

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        
                    echo "<td>".$row["isi_tugas"]."</td>";
                    echo "<td>
                        <a href='edit.php?id_tugas={$row['id_tugas']}'>Edit</a> / 
                        <a href='proseshapus.php?id_tugas={$row['id_tugas']}' 
                           onclick=\"return confirm('Anda yakin akan menghapus data?')\">Hapus</a>
                      </td>";
                    echo "</tr>";
                    }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
            }

            echo "</table>";
            ?>
            </tbody>
        </table>
     </div>        
</body>
</html>