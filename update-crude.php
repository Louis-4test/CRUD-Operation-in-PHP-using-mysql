<?php 
    session_start();
    include "connect.php";

    $firstname = $_POST['Fname'];
    $lastname = $_POST['Lname'];
    $email = $_POST['email'];
    $gender = $_POST['G'];
    $id = $_POST['id'];


    $sql = "UPDATE customer  SET 
                                fname='$firstname',
                                lname='$lastname',
                                email='$email',
                                gender='$gender' 
                            WHERE custID=$id";

    if ($conn->query($sql)=== TRUE) {
            $_SESSION["msg"]="record updated successfully";
            header("location:index.php");
    }else{
        echo "Error updating Record".$conn->error;
    }
    $conn->close;
?>
