<?php
include 'db.php';
session_start();
$customerId = $_SESSION['customerId'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>FOODIES.COM
    </title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .cust-height {
            height: 60px;
        }

        .color-cust {
            color: white;
        }

        color-cust:hover {
            background-color: red;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a href="index.php" target="main"><img src="images/logo3.png" width="180px" height="60px" align="left"></a>
            </div>
            <div class="col-10">
                <?php include 'nav.php' ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center class='text-success'>
                        <h2>MY ORDERS</h2>
                    </center>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-sm ">
                        <tr>
                            <th>ORDER ITEMS</th>
                            <th>BILL</th>
                            <th>ORDER DATE</th>
                            <th>PAID THROUGH</th>
                            <th>ORDER STATUS</th>
                            <th>VIEW ORDER</th>
                        </tr>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM orders WHERE custId='$customerId'");
                        while ($row = mysqli_fetch_array($result)) {

                        ?>
                            <tr>
                                <td><?php echo $row['items']; ?></td>
                                <td>Rs.<?php echo $row['bill']; ?></td>
                                <td><?php echo $row['orderon']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['order_status']; ?></td>
                                <td> <a href="view_order.php?orderId=<?php echo $row['ordId']; ?>" class="btn btn-danger">VIEW ORDER</a> </td>

                            </tr>
                        <?php }
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>

</html>