<?php
include 'db.php';
session_start();
$id = $_GET['menu'];
$query = "SELECT * FROM food WHERE restaurantId='$id'";
$result = mysqli_query($conn, $query);


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
                        <h2>ALL AVAILABLE MENUS</h2>
                    </center>
                </div>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="col-md-3">
                        <table class="">

                            <tr>
                                <td colspan='2'><img src="Owner/images/<?php echo $row['photo']; ?>" height='200' width='200' /> </td>
                            </tr>
                            <tr>
                                <td><b>Food Name</b></td>
                                <td><?php echo $row['pname']; ?> </td>
                            </tr>
                            <tr>
                                <td><b>Food Price</b></td>
                                <td><?php echo $row['pprice']; ?> </td>
                            </tr>
                            <tr>
                                <td><b>Food Category</b></td>
                                <td><?php echo $row['pcat']; ?> </td>
                            </tr>
                            <td colspan="2"><a href="add-to-cart.php?pId=<?php echo $row['pId'] ?>" class="btn btn-primary w-100 <?php if (empty($_SESSION['customerId'])) {
                                                                                                                                        echo 'disabled';
                                                                                                                                    } ?>">Add To Cart</a></td>
                        </table>
                    </div>
                <?php } ?>
            </div>


        </div>
</body>

</html>