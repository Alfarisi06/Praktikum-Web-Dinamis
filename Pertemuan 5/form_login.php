<?php
// echo "<h2>login</h2>
//     <form method = post action = cek_login.php>
//     <table>
//     <tr><td>username</td><td>: <input name = 'id_user' type = 'text'></td></tr>
//     <tr><td>username</td><td>: <input name = 'passwd' type = 'text'></td></tr>
//     <tr><td colspan = 2><input type = 'submit' value = 'LOGIN'></td></tr>
//     </table>
//     </form>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title of the document</title>
</head>

<body>

    <h2>login</h2>
    <form action="cek_login.php" method="post">
        <table>
            <tr>
                <td>username</td>
                <td><input type="text" name="id_user"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="passwd"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="LOGIN"></td>
            </tr>
        </table>
    </form>

</body>

</html>