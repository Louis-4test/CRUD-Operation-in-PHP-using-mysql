<?php
    session_start();
    include "connect.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM customer WHERE custID = '$id'";

    $result = $conn->query($sql);

    $conn->close();

    $_SESSION['msg'] = 'Data Delete Successfully';
    header("location:index.php")
?>
