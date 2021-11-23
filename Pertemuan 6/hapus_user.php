<?php
    include "koneksi.php";
    $id_user = $_GET['id'];
    $sql = "DELETE FROM users WHERE id_user = '$id_user'";
    mysqli_query($con, $sql);
    mysqli_close($con);

    header('location:tampil_user.php');
?>