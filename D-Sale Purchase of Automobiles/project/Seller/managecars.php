<?php
include 'db.php';
session_start();
$id = $_SESSION['seller'];
//echo $id;
$query = "select * from  vehicles where sellerId='$id'";
$result = mysqli_query($conn, $query);
//script for delete inventory item 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "delete from vehicles where vehicleId='$id'");
    header('location:managecars.php');
}


if (isset($_GET['sold'])) {
    $vid = $_GET['sold'];
    mysqli_query($conn, "UPDATE vehicles set status='Vehicle Is Sold' where vehicleId='$vid'");
    header('location:managecars.php');
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>ONLINE USED CARS SALE AND PURCHASE SYSTEM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background: #ecf0f5;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .cust-bg {
            background: #222d32;
        }

        .nav-back {
            background: #3c8dbc;
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
                <h4>SELLER PANNEL &nbsp ONLINE USED CARS SALE AND PURCHASE SYSTEM </h4>
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
                    <h5 class="text-primary">MANAGE VEHICLES </h5>
                </center>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vehicle Make</th>
                            <th>Vehicle Model</th>
                            <th>Vehicle Color</th>
                            <th>Registration City</th>
                            <th>Year Of Make</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Change Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['make']; ?></td>
                                <td><?php echo $row['model']; ?></td>
                                <td><?php echo $row['color']; ?></td>
                                <td><?php echo $row['regcity']; ?></td>
                                <td><?php echo $row['year_of_make']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td> <a href="edit_vehicle.php?id=<?php echo $row['vehicleId']; ?>" class="btn btn-block btn-warning">EDIT</a></td>
                                <td> <a href="?id=<?php echo $row['vehicleId']; ?>" class="btn btn-block btn-danger">DELETE</a></td>
                                <td> <a href="?sold=<?php echo $row['vehicleId']; ?>" class="btn btn-block btn-dark">MARK AS SOLD</a></td>

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