<?php 
    echo "<h2>user</h2>
    <form methode = POST action = form_user.php>
    <input type = submit value = 'tambah user'>
    </form>
    <table>
    <tr><th>no</th><td>username</th><th>nama lengkap</th><th>email</th><th>aksi</th></tr>";

    include "koneksi.php";
    $sql = "SELECT * FROM users order by id_user";
    $tampil = mysqli_query($con, $sql);
    if (mysqli_num_rows($tampil) > 0) {
        $no = 1;
        while ($r = mysqli_fetch_array($tampil)) {
            echo "<tr><td>$no</td><td>$r[id_user]</td>
            <td>$r[nama_lengkap]</td>
            <td>$r[email]</td>
            <td><a href='hapus_user.php?id=$r[id_user]'>hapus</a></td>
            </tr>";
            $no++;
        }
        echo "</table>";
    }
    else{
        echo "0 results";
    }
    mysqli_close($con);
?>