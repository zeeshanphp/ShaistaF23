<?php
include 'db.php';
session_start();
$id = $_SESSION['seller'];
//echo $id;
$query = "select * from  order_items where seller='$id'";
$result = mysqli_query($conn, $query);
//script for delete inventory item 


if (isset($_GET['send'])) {
    $vid = $_GET['send'];
    mysqli_query($conn, "UPDATE order_items set status='Order Released' where order_items_id='$vid'");
    header('location:orders.php');
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
                            <th>Item Name</th>
                            <th>Item price</th>
                            <th>Status</th>
                            <th>Update Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['pname']; ?></td>
                                <td><?php echo $row['pprice']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <?php if ($row['status'] == "Pending") { ?>
                                    <td> <a href="?send=<?php echo $row['order_items_id']; ?>" class="btn btn-block btn-dark">Send Order</a></td>
                                <?php } else { ?>
                                    <td> <span class="badge badge-primary"><?php echo $row['status'] ?></span></td>
                                <?php  } ?>

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