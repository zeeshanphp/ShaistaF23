<?php
include 'db.php';
session_start();
$find_query = "SELECT * FROM restaurants";
$result = mysqli_query($conn, $find_query);


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
        <div class="container mt-4">
            <div class="row py-4">



                <?php
                while ($row = mysqli_fetch_array($result)) { ?>

                    <div class="col-md-3">
                        <table class="table table-borderless">
                            <tr>
                                <td colspan="2"> <img src="Owner/images/<?php echo $row['photo'] ?>" height="200" width="200"> </td>
                            </tr>
                            <tr>
                                <td> <b>Restaurant</b> </td>
                                <td><?php echo $row['dname'] ?></td>
                            </tr>
                            <tr>
                                <td> <b>Contact</b> </td>
                                <td><?php echo $row['dphone'] ?></td>
                            </tr>
                            <tr>
                                <td> <b>Location</b> </td>
                                <td><?php echo $row['location'] ?></td>
                            </tr>

                        </table>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</body>

</html>