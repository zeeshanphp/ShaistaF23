<?php
include 'db.php';
session_start();
//echo $_SESSION['customerId'];
$query = "select * from vehicles";
$result = mysqli_query($conn, $query);
?>

<html>

<head>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            color: #f8f9d2;

            background-color: #2d3436;
            background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);
        }

        h4 {
            color: #f8f9d2;
        }

        ul li a {
            color: #f8f9d2;
        }

        ul li:hover {
            background: #f8f9d2;
            border-radius: 5px;
            color: blue;
            font-weight: bold;
        }

        .btn:hover {
            background: grey;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-2 m-0 p-0">
                <img src="images/logo.png" width="100%" />
            </div>
            <div class="col-md-10">
                <?php include 'nav.php'; ?>

            </div>

        </div>
        <div class="row">
            <img src="images/pbanner.jpg" height="200" width="100%" />
        </div>
        <center>
            <h4>VEHICLES FOR SALE</h4>
        </center>
        <div class="row">

            <?php while ($fetch_items = mysqli_fetch_array($result)) { ?>
                <div class="col-md-3 py-2">
                    <table>
                        <tr>
                            <td colspan="2"><img src="Seller/images/<?php echo $fetch_items['image'] ?>" height="200" width="200" />
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right;"><b>Vehicle Name:</b></td>
                            <td><?php echo $fetch_items['make']; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align:right;"><b>Vehicle Model:</b></td>
                            <td><?php echo $fetch_items['model']; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align:right;"><b>Registration City:</b></td>
                            <td><?php echo $fetch_items['regcity']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <a href="view_seller.php?id=<?php echo  $fetch_items['sellerId'];  ?>" class="btn btn-warning w-100 <?php echo $style; ?>">VIEW SELLER INFO</a></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <a href="view_vehicle_info.php?id=<?php echo  $fetch_items['vehicleId'];  ?>" class="btn btn-warning w-100 <?php echo $style; ?>">VIEW VEHICLE INFO</a></td>
                        </tr>
                    </table>
                </div>

            <?php } ?>
        </div>
    </div>
</body>

</html>