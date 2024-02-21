<?php
include 'db.php';
session_start();
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
                <div class="col-md-12">
                    <center>
                        <h4 class="text-success">SEARCH RESTAURANT</h4>
                    </center>
                    <form method="post">
                        <table class="table">
                            <tr>
                                <td><input type="text" name="nfind" class="form-control"></td>
                                <td><input type="submit" name="nsearch" value="SEARCH ITEM" class="btn btn-info w-100"></td>
                            </tr>
                        </table>
                    </form>
                </div>


                <?php
                if (isset($_POST['nsearch'])) {
                    $find = $_POST['nfind'];
                    $query = "select * from restaurants where location LIKE '$find%'";
                    $result = mysqli_query($conn, $query);
                    while ($fetch_items = mysqli_fetch_array($result)) { ?>
                        <div class="col-md-3">
                            <table class="table table-borderless">
                                <tr>
                                    <td colspan="2"> <img src="Owner/images/<?php echo $fetch_items['photo'] ?>" height="200" width="200"> </td>
                                </tr>
                                <tr>
                                    <td> <b>Restaurant</b> </td>
                                    <td><?php echo $fetch_items['dname'] ?></td>
                                </tr>
                                <tr>
                                    <td> <b>Contact</b> </td>
                                    <td><?php echo $fetch_items['dphone'] ?></td>
                                </tr>
                                <tr>
                                    <td> <b>Location</b> </td>
                                    <td><?php echo $fetch_items['location'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"> <a href="restaurant_menu.php?menu=<?php echo $fetch_items['restaurantId'] ?>" class="btn btn-success w-100 bg-gradient">View Menu</a> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"> <a href="chat.php?owner=<?php echo $fetch_items['owner'] ?>" class="btn btn-success w-100 bg-gradient">Chat With Owner</a> </td>
                                </tr>
                            </table>
                        </div>
                <?php }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>