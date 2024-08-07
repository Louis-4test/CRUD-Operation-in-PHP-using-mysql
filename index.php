<?php 
    session_start();
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operations in PHP Using MySQL Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">

    table
    {
        width: 100%;
        text-align: center;
    }
    tr td
    {
        border-bottom: 1px solid black;
        height: 50px;
    }
  </style>
</head>
<body>
<?php 
    if(isset($_SESSION["msg"]) && !empty($_SESSION["msg"]))
        {
            $msg=$_SESSION["msg"];
            echo "<div class='msgbox alert alert-success p-1 text-center m-0' style='background-color:#9bffbbfa; width: 300px; height: 30px'>".$msg."</div>";
            unset($_SESSION['msg']);
            session_destroy();
        }
?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-md-11">
                            <h1>Crud Operations in PHP Using MySQL</h1>
                        </div>
                        <div class="col-md-1 text-end">
                            <a href="table-insert.php" type="button" class="btn btn-success"><i class="fa fa-plus-square-o  " aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class='table table-striped'>
                                    <tr>
                                        <th>ID</th>
                                        <th> F-Name </th>
                                        <th> L-Name </th>
                                        <th>email</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                    <?php 
                        $sql = "SELECT * FROM customer";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                    echo"<tr>";
                                            echo "<td>" .$row['custID']."</td>";
                                            echo "<td>" .$row['fname']."</td>";
                                            echo "<td>".$row['lname']."</td>";
                                            echo "<td>".$row['email']."</td>";
                                            echo "<td>".$row['gender']."</td>";
                                            echo "<td class='icon-td'>";
                                                    echo '<a href="update.php?id='. $row['custID'] .'"title="Update Record" class="btn btn-success" data-toggle="tooltip"><span class="fa fa-pencil"></span>Update</a>';
                                                    echo '<a href="delete.php?id='. $row['custID'] .'" title="Delete Record" class="btn btn-danger mx-1" data-toggle="tooltip"><span class="fa fa-trash"></span>Delete</a>';
                                            echo "</td>";
                                            echo "</tr>";
                            }
                        
                        }else{
                            echo "  <tr>
                                        <td colspan='6'>No Data Avilable in Table!</td>
                                    </tr>";
                        }
                        mysqli_close($conn);
                    ?>
                </table>
            </div> 
        </div>
    </div>
</body> 
</html>
