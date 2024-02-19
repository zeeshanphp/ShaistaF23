<?php
include 'db.php';
session_start();
$id = $_GET['id'];
$result_vehicle = mysqli_query($conn, "SELECT * FROM vehicles WHERE vehicleId='$id'");
$result_vehicle_photos = mysqli_query($conn, "SELECT * FROM vehicle_photos WHERE vehicleId='$id'");

$row_vehicle = mysqli_fetch_array($result_vehicle);
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
    <div class="container-fluid">
        <div class="row py-4">
            <div class="col-md-2 m-0 p-0">
                <img src="images/logo.png" width="100%" />
            </div>
            <div class="col-md-10">
                <?php include 'nav.php'; ?>

            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="Seller/images/<?php echo $row_vehicle['image'] ?>" height="350" class="d-block w-100" alt="...">
                        </div>
                        <?php
                        while ($row = mysqli_fetch_array($result_vehicle_photos)) {
                        ?>
                            <div class="carousel-item">
                                <img src="Seller/images/<?php echo $row['filename'] ?>" height="350" class="d-block w-100" alt="...">
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-dark">
                        <center> <b> Vehicle Information</b></center>
                    </div>
                    <div class="card-body">
                        <table class="table text-dark table-striped">
                            <tr>
                                <td>Vehicle Make</td>
                                <td><?php echo $row_vehicle['make']; ?></td>
                            </tr>
                            <tr>
                                <td>Vehicle Model</td>
                                <td><?php echo $row_vehicle['model']; ?></td>
                            </tr>
                            <tr>
                                <td>Registration City</td>
                                <td><?php echo $row_vehicle['regcity']; ?></td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td><?php echo $row_vehicle['color']; ?></td>
                            </tr>
                            <tr>
                                <td>Year Of Make</td>
                                <td><?php echo $row_vehicle['year_of_make']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php echo $row_vehicle['status']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header text-dark">
                        <center> <b>Vehicle Description</b> </center>
                    </div>
                    <div class="card-body text-dark">
                        <?php echo $row_vehicle['description']; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>