<?php
include_once("koneksi.php");
$result = mysqli_query($con, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>halaman utama</title>
    </head>

<body>

    <a href="tambah.php">tambah data baru</a><br><br>

    <table width='80%' border="1">
        <tr>
            <th>nim</th>
            <th>nama</th>
            <th>gender</th>
            <th>alamat</th>
            <th>tanggal lahir</th>
            <th>update</th>
        </tr>
        <?php 
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                    echo "<td>".$user_data['nim']."</td>";
                    echo "<td>" . $user_data['nama'] . "</td>";
                    echo "<td>" . $user_data['jkel'] . "</td>";
                    echo "<td>" . $user_data['alamat'] . "</td>";
                    echo "<td>" . $user_data['tgllhr'] . "</td>";
                    echo "<td><a href='edit.php?nim=$user_data[nim]'>edit</a> | <a href='delete.php?nim=$user_data[nim]'>delete</a></td></tr>";
            }
        ?>
    </table>

</body>

</html>