<?php
include 'db.php';
session_start();
$orderId = $_GET['orderId'];
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
                        <h2>ORDER DETAILS</h2>
                    </center>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-sm ">
                        <tr>
                            <th>ORDERED ITEMS</th>
                            <th>BILL</th>
                            <th>ORDER STATUS</th>
                        </tr>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM order_items WHERE orderId='$orderId'");
                        while ($row = mysqli_fetch_array($result)) {

                        ?>
                            <tr>
                                <td><?php echo $row['pname']; ?></td>
                                <td>Rs.<?php echo $row['pprice']; ?></td>
                                <td><?php echo $row['status']; ?></td>
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