<?php        
        $host = "localhost";
        $username = "root";
        $password = "";
        $databasename = "postingan";
        $con = mysqli_connect($host, $username, $password, $databasename);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Title of the document</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    //define variables and set to empty values
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $nama = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['nama'])) {
            $namaErr = "nama harus diisi";
        } else {
            $nama = test_input($_POST['nama']);
        }
        if (empty($_POST['email'])) {
            $emailErr = "email harus di isi";
        } else {
            $email = test_input($_POST['email']);

            //check if e-mail address is ell-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "email tidak sesuai format";
            }
        }
        if (empty($_POST['website'])) {
            $website = "";
        } else {
            $website = test_input($_POST['website']);
        }
        if (empty($_POST['comment'])) {
            $comment = "";
        } else {
            $comment =
                test_input($_POST['comment']);
        }
        if (empty($_POST['gender'])) {
            $genderErr = "gender harus di isi";
        } else {
            $gender = test_input($_POST['gender']);
        }
    }
    if (isset($_POST['submit'])) {
        if ($emailErr != TRUE) {
            $sql = "INSERT INTO tabel(nama, email, website, comment, gender)VALUES('$nama', '$email', '$website', '$comment', '$gender')";
            $hubungkan = mysqli_query($con, $sql);
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    // function cek($value){
    //     if ($value == NULL) {
    //         echo "tidak ada data";
    //     }

    //     return $value;
    // }

    ?>

    <h2>Posting Komentar</h2>

    <p><span class="error">* Harus Diisi</span></p>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

        <table>
            <tr>
                <td>Nama: </td>
                <td>
                    <input type="text" name="nama">
                    <span class="error"><?php echo $namaErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>
                    <input type="text" name="email">
                    <span class="error"><?php echo $emailErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Website</td>
                <td>
                    <input type="text" name="website">
                    <span class="error"><?php echo $websiteErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td>
                    <textarea name="comment" cols="40" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="L">Laki-Laki
                    <input type="radio" name="gender" value="P">Perempuan
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>
            <td>
                <input type="submit" name="submit" value="Submit">
            </td>
        </table>
    </form>

    <table border="1" style="width: 100%;">
        <tr>
            <th>Nama</th>
            <th>E-mail</th>
            <th>Website</th>
            <th>Komentar</th>
            <th>Gender</th>
        </tr>
        <?php
       
        $tampil = "SELECT * FROM tabel";
        $result = mysqli_query($con, $tampil);
        while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
                <td>
                    <?php echo $data['nama']; ?>
                </td>
                <td>
                    <?php echo $data['email']; ?>
                </td>
                <td>
                    <?php echo $data['website']; ?>
                </td>
                <td>
                    <?php echo $data['comment']; ?>
                </td>
                <td>
                    <?php echo $data['gender']; ?>
                </td>
            </tr>
        <?php }
        ?>
    </table>
</body>

</html>