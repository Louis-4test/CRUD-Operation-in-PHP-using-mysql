<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .error
        {
            color: red;
        }
    </style>
</head>
<body>
    <?php 
        $fnameErr = $lnameErr = $genderErr = $emailErr = "";
        $fname = $lname = $gender = $email= "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['fname'])) {
                $fnameErr = "first name is required!";
            }
            
            if (empty($_POST['lname'])) {
                $lnameErr = "last name is required!";
            }

            if (empty($_POST['email'])) {
                $emailErr = "email is required!";
            }

            if (empty($_POST['gender'])) {
                $genderErr = "gender is required!";
            }
            if (empty($fnameErr)&&empty($lnameErr)&&empty($genderErr)) {
                session_start();
                    include "connect.php";

                    $firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    $email = $_POST['email'];
                    $gender = $_POST['gender'];

                    $sql = "INSERT INTO customer (fname,lname,email,gender)
                    VALUES('$firstname','$lastname','$email','$gender')"; 

                    if ($conn->query($sql)===TRUE) {
                        $_SESSION['msg'] = 'Data Insert Successfully';
                        header('location:index.php');
                    }else{
                        echo "Error: " .$sql . "<br>" . mysqli_error($conn);
                    }
                    $conn->close();

            }
        }
    ?>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card" style="width:500px; height: 500px;">
            <div class="card-header">
                <h1>Enter data</h1>
            </div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="my-3">
                        <label for="fname">first name</label>
                        <span class="error">*<?php echo $fnameErr ?></span>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First name">
                    </div>
                    
                    <div class="my-3">
                        <label for="lname">last name</label>
                        <span class="error">*<?php echo $lnameErr ?></span>
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter last name">
                    </div>

                    <div class="my-3">
                        <label for="email">email</label>
                        <span class="error">*<?php echo $emailErr ?></span>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
                    </div>
                    
                    <div class="my-3">
                        <label for="gender">gender : </label>
                        <span class="error">*<?php echo $genderErr ?></span><br>
                        <input type="radio" name="gender" id="gender" value="male">male
                        <input type="radio" name="gender" id="gender" value="female">female
                    </div>
                    
            </div>
            <div class="card-footer text-end">
                <input type="submit" name="save" class="btn btn-primary">
                <a href="index.php" class="btn btn-danger">cancle</a>
            </div>
        </div>
</div>
</body>
</html>
