<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <style type="text/css">
            .wrapper{
                width: 650px;
                margin: 0 auto;
            }
            .page-header h2{
                margin-right: 15px;
            }
            table tr td:last-child a{
                margin-right: 15px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class=row">
                    <div class="cold-md-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">Employee Details</h2>
                            <a href="create.php" class="btn btn-success pull-right">Add New Employees</a>
                        </div>
                        <?php
                        // Include config file
                        require_once "config.php";

                        // Attempt select query executions
                        $sql = "SELECT * FROM employees";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='table table_bordered table-striped'>";
                                    echo "<thead>";
                                        echo"<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th> Last Name </th>";
                                        echo "<th> First Name </th>";
                                        echo "<th> Address </th>";
                                        echo "<th> Contact </th>";
                                        echo "<th> Email </th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>".$row['id']."</td>";
                                            echo "<td>".$row['last_name']."</td>";
                                            echo "<td>".$row['first_name']."</td>";
                                            echo "<td>".$row['address']."</td>";
                                            echo "<td>".$row['contact']."</td>";
                                            echo "<td>".$row['email']."</td>";

                                            echo "<td>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                            echo "</td>";
                                    }
                                 echo "</tbody>";
                                 echo "</table>";
                                 mysqli_free_result($result);
                            } else{
                                echo "NO RECORDS WERE FOUND!";
                            }
                        } else {
                            echo "ERROR: COULD NOT EXECUTE SQL" . mysqli_error($link);
                        }

                        mysqli_close($link);
                        ?>
                    </div>
                </div>
            </div>
        </div>
                
    </body>
</html>