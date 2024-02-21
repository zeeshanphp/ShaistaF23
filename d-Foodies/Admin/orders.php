<?php
include 'db.php';
session_start();

$query = "SELECT * FROM orders o JOIN users u ON o.custId = u.userId";
$result = mysqli_query($conn, $query);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE userId='$id'");
    header('location:view_customers.php');
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>FOODIES.COM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/styles.css">
    <style>
    </style>
</head>

<body>
    <nav class="container-fluid py-3 nav-back">
        <?php include 'top-nav.php' ?>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 top-bg px-0">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-9 mx-4 mt-4" style="background: #fff;">
                <center>
                    <h5 class="text-color"><b>ORDERS PLACED BY CUSTOMERS</b> </h5>
                </center>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> Phone</th>
                            <th> Items</th>
                            <th> Bill</th>
                            <th>Order Date</th>
                            <th>Payment Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['items']; ?></td>
                                <td><?php echo $row['bill']; ?></td>
                                <td><?php echo $row['orderon']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                        <?php

                        } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>