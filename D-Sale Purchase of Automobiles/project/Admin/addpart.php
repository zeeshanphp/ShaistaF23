<?php

?>
<!DOCTYPE html>
<html>

<head>
    <title>Sale Purchase of Automobiles and Spare Parts</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background: #C5E8B7;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .cust-bg {
            background: #83D475;
        }

        .nav-back {
            background: #57C84D;
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
                <h4>ADMIN PANNEL &nbsp&nbsp ONLINE FABRICS EMPORIUM </h4>
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
            <div class="col-md-8 mx-4 mt-4" style="background: #fff;">

            </div>
        </div>

    </div>
</body>

</html>