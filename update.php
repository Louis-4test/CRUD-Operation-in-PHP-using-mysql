<?php
    include "connect.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM customer WHERE custID = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        }else{
        echo "0 result";
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center mt-5">
        <div class="card " style="width:500px">
            <div class="card-header">
                <h2>Update Record</h2>
                <p>Please edit the input values and submit to update the record.</p>
            </div>
            <div class="card-body">
                <form action="update-crude.php" method="post">
                    <div class="mt-2">
                        <label>firstname</label>
                        <input type="text" name="Fname" class="form-control" value="<?php echo $row['fname']; ?>" required="">
                    </div>

                    <div class="mt-2">
                        <label>lastname</label>
                        <input type="text" name="Lname" class="form-control" value="<?php echo $row['lname']; ?>"  required="">
                    </div>

                    <div class="mt-2">
                        <label>email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>"  required="">
                    </div>

                    <div class="mt-2">
                        <label>gender</label>
                        <input type="radio" name="G" value="female" <?php echo $row['gender'] == 'female' ? "checked":"";  ?> >female
                        <input type="radio" name="G" value="male" <?php echo $row['gender'] == 'male' ? "checked":"";  ?>   >male
                    </div>

                    <input type="hidden" name="id" value="<?php echo $row['custID']; ?>">

            </div>
            <div class="card-footer text-end">
                <input type="submit" name="save" class="btn btn-primary" >
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</body>
</html>
