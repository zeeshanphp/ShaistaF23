<?php
include 'db.php';
session_start();
$owner = $_SESSION['owner'];
$query = "SELECT * FROM order_items o JOIN restaurants r ON o.restaurantId=r.restaurantId WHERE o.owner='$owner'";
$result = mysqli_query($conn, $query);
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE order_items SET status='Order Sent' WHERE order_items_id='$id'");
    header('location: orders.php');
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
            <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
                <center>
                    <h5 class="text-color"><b>MANAGE RESTAURANT</b> </h5>
                </center>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Restaurant Name</th>
                            <th>Food Name</th>
                            <th>Food Price</th>
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
                                <td><?php echo $row['dname']; ?></td>
                                <td><?php echo $row['pname']; ?></td>
                                <td><?php echo $row['pprice']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <?php
                                if ($row['status'] == "Pending") { ?>
                                    <td> <a href="?approve=<?php echo $row['order_items_id']; ?>" class="btn btn-block btn-danger">UPDATE STATUS</a></td>
                                <?php } else { ?>
                                    <td>
                                        <span class="badge badge-success">
                                            <?php echo $row['status'] ?>
                                        </span>
                                    </td>
                                <?php }
                                ?>

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