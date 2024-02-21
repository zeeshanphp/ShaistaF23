<?php
include 'db.php';
function countRecords($table)
{
    $conn = mysqli_connect('localhost', 'root', '', 'foodies');

    $result_owners = mysqli_query($conn, "SELECT * FROM  $table");

    return  mysqli_num_rows($result_owners);
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
                <div class="row mt-3">
                    <div class="col-md-3 bg-success py-3 text-white mx-2 my-2 rounded">
                        <center> <b>Owners <br></b> <b><?php echo countRecords('owner') ?></b></center>
                    </div>
                    <div class="col-md-3 bg-warning  py-3 text-white my-2 mx-2 rounded">
                        <center> <b>Users <br></b> <b><?php echo countRecords('users') ?> </b>
                        </center>
                    </div>
                    <div class="col-md-3 bg-danger  py-3 text-white mx-2 my-2 rounded">
                        <center> <b>Restaurants <br></b> <b><?php echo countRecords('restaurants') ?> </b>
                        </center>
                    </div>
                    <div class="col-md-3 bg-dark  py-3 text-white mx-2 my-2 rounded">
                        <center> <b>Food <br></b> <b><?php echo countRecords('food') ?> </b>
                        </center>
                    </div>
                    <div class="col-md-3 bg-info  py-3 text-white mx-2 my-2 rounded ">
                        <center> <b>Orders <br></b> <b><?php echo countRecords('orders') ?> </b>
                        </center>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>