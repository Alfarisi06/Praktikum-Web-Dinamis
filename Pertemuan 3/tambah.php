<!DOCTYPE html>
<html>

<head>
    <title>tambah data mahasiswa</title>
</head>

<body>

    <a href="index.php">go to home</a>
    <br><br>

    <form name="form1" action="tambah.php" method="post">
        <table width="25%" border="0">
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Gender (L/P)</td>
                <td><input type="text" name="jkel"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgllhr"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <?php 
        if (isset($_POST['submit'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jkel = $_POST['jkel'];
            $alamat = $_POST['alamat'];
            $tgllhr = $_POST['tgllhr'];

            include_once("koneksi.php");

            $result = mysqli_query($con, "INSERT INTO mahasiswa(nim, nama, jkel, alamat, tgllhr)VALUES('$nim', '$nama', '$jkel', '$alamat', '$tgllhr')");

            echo "data berhasil di simpan <a href='index.php'>View User</a>";
        }
    ?>

</body>

</html>