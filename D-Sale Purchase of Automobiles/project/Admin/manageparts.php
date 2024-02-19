<?php
include 'db.php';
session_start();

$query = "select * from parts";
$result = mysqli_query($conn, $query);
//script for delete inventory item 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "delete from parts where pId='$id'");
    header('location:manageparts.php');
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Sale Purchase of Automobiles and Spare Parts</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background: #ecf0f5;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .nav-back,
        .cust-bg {
            background: #2d3436;
            color: #FFF;
        }

        ul li a {
            color: #b8c7ce;
        }

        ul li:hover {
            background: #636e72;
            color: #b8c7ce;
        }
    </style>

</head>

<body>
    <nav class="container-fluid py-3 nav-back">
        <div class="row">
            <div class="col-md-8">
                <h4>ADMIN PANNEL &nbsp&nbsp Sale Purchase of Automobiles and Spare Parts </h4>
            </div>
            <div class="col-md-4">
                <a href="logout.php" class="btn btn-danger float-right">Logout</a>
            </div>
        </div>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 cust-bg">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-10 mt-4" style="background: #fff;">
                <center>
                    <h5 class="text-primary">MANAGE SPARE PARTS </h5>
                </center>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Model</th>
                            <th>Part Name</th>
                            <th>Part Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['pcat']; ?></td>
                                <td><?php echo $row['vehname']; ?></td>
                                <td><?php echo $row['vehmodel']; ?></td>
                                <td><?php echo $row['pname']; ?></td>
                                <td><?php echo $row['pprice']; ?></td>
                                <td> <a href="edit_item.php?id=<?php echo $row['pId']; ?>" class="btn btn-block btn-warning">EDIT</a></td>
                                <td> <a href="?id=<?php echo $row['pId']; ?>" class="btn btn-block btn-danger">DELETE</a></td>

                            </tr>
                        <?php

                        } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>