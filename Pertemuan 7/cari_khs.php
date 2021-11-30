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
    <h3>form pencarian DATA KHS dengan php</h3>

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
            <th>Nim</th>
            <th>Kode MK</th>
            <th>Nilai</th>
        </tr>
        <?php
        if (isset($_GET['masuk'])) {
            $cari = $_GET['cari'];
            $sql = "SELECT * FROM khs where nim like '%" . $cari . "%'";
            $tampil = mysqli_query($con, $sql);
        } else {
            $sql = "SELECT * FROM khs";
            $tampil = mysqli_query($con, $sql);
        }
        $no = 1;
        while ($r = mysqli_fetch_array($tampil)) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $r['nim']; ?></td>
                <td><?php echo $r['kodeMK']; ?></td>
                <td><?php echo $r['nilai']; ?></td>
            </tr>
        <?php }
        ?>
    </table>
</body>

</html>