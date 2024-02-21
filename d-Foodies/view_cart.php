<?php
include 'db.php';
session_start();
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $val = $_GET['val'];
    $_SESSION['cart'];
    unset($_SESSION['cart'][$val]);
}

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
                        <h2>MY CART</h2>
                    </center>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-sm ">
                        <tr>
                            <th>FOOD NAME</th>
                            <th>PRICE</th>
                            <th>UPDATE CART</th>

                        </tr>
                        <?php
                        //PREVIOUS CODE
                        //$name stores id and $value stores quantity
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $result = mysqli_query($conn, "select * from  food where pId= '" . $value . "'");
                            while ($row = mysqli_fetch_array($result)) {

                        ?>
                                <tr>
                                    <td><?php echo $row['pname']; ?></td>
                                    <td>Rs.<?php echo $row['pprice']; ?></td>
                                    <td> <a href="?remove=<?php echo $key; ?>&val=<?php echo $key; ?>" class="btn btn-danger">REMOVE FROM CART</a> </td>

                                </tr>
                        <?php }
                        }
                        ?>
                        <tr>
                            <td colspan="2"><a href="menu.php" class="btn btn-primary btn-block">ORDER MORE FOOD</a></td>
                            <td colspan="2"><a href="checkout.php" class="btn btn-warning">MAKE CHECKOUT</a></td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
</body>

</html>