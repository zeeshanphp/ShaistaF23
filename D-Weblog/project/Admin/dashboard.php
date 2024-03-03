<?php
include 'db.php';
function countRecords($table)
{
    $conn = mysqli_connect('localhost', 'root', '', 'web_bloger');

    $result_records = mysqli_query($conn, "SELECT * FROM  $table");

    return  mysqli_num_rows($result_records);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/styles.css">
    <style>
    </style>
</head>

<body>
    <nav class="container-fluid py-3 bg-primary bg-gradient text-white">
        <?php include 'top-nav.php' ?>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-primary px-0">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-9 mx-4 mt-4" style="background: #fff;">
                <div class="row mt-3">

                    <div class="col-md-5 bg-warning  py-3 text-white my-2 mx-2 rounded">
                        <center> <b>Users <br></b> <b><?php echo countRecords('users') ?> </b>
                        </center>
                    </div>
                    <div class="col-md-5 bg-danger  py-3 text-white mx-2 my-2 rounded">
                        <center> <b>Blogs <br></b> <b><?php echo countRecords('blogs') ?> </b>
                        </center>
                    </div>
                    

                </div>

            </div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>