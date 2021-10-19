<?php
include_once("koneksi.php");
if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jkel = $_POST['jkel'];
    $alamat = $_POST['alamat'];
    $tgllhr = $_POST['tgllhr'];

    $result = mysqli_query($con, "UPDATE mahasiswa SET nama='$nama', jkel='$jkel', alamat='$alamat', tgllhr='$tgllhr' WHERE nim='$nim'");

    header("location:index.php");
}
?>

<?php
$nim = $_GET['nim'];
$result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");

while ($user_data = mysqli_fetch_array($result)) {
    $nim = $user_data['nim'];
    $nama = $user_data['nama'];
    $jkel = $user_data['jkel'];
    $alamat = $user_data['alamat'];
    $tgllhr = $user_data['tgllhr'];
}
?>
<!DOCTYPE html>
<html>

<head>

    <title>Edit Data Mahasiswa</title>

</head>

<body>

    <form name="update_mahasiswa" action="edit.php" method="post">

        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nim; ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="jkel" value="<?php echo $jkel; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgllhr" value="<?php echo $tgllhr; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nim" value="<?php echo $_GET['nim'] ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>

</body>

</html>