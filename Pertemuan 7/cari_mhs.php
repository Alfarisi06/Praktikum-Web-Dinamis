<?php
    include "koneksi.php";
    error_reporting(0);
?>
<!doctype html>
<html lang="en">

<head>

    <title>kegiatan</title>
</head>

<body>
    <h3>form pencarian dengan php mahasiswa</h3>

    <form action="" method="get">
        <label>cari</label>
        <input type="text" name="cari" id="">
        <input type="submit" name="masuk" value="Cari">
    </form>

    <?php
    if (isset($_GET['masuk'])) {
        $cari = $_GET['cari'];
        echo "<b>hasil pencarian: " . $cari . "</b>";
    }
    ?>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>
        <?php 
            if(isset($_GET['masuk'])){
                $cari = $_GET['cari'];
                $sql = "SELECT * FROM mahasiswa where nama like '%".$cari."%'";
                $tampil = mysqli_query($con, $sql);
            }
            $no = 1;
            while($r = mysqli_fetch_array($tampil)){?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $r['nama']; ?></td>
                </tr>
            <?php }
        ?>
    </table>
</body>

</html>