<?php
session_start();
include "connection.php";
if (empty($_SESSION['studentId'])) {
    header('location:tutors.php');
}
$message = "";

if (isset($_POST['add_reviews'])) {
    $studentId = $_SESSION['studentId'];
    $tutor = $_GET['tutor'];
    $desc = $_POST['desc'];
    $query_reviews = "insert into reviews (tutorId, studentId, review) values('$tutor','$studentId','$desc')";
    mysqli_query($conn, $query_reviews);
    header('location: reviews.php?tutor=' . $tutor);
}
?>
<!doctype html>
<html lang="">

<head>
    <title>TUTOR FINDER</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style type="text/css">

    </style>
</head>

<body>
    <!-- header section -->

    <header id="header">
        <div class="header-content clearfix"> <a class="logo" href="index.html">tutors <span>HUB</span></a>
            <div class="navigation">
                <?php include 'nav-bar.php' ?>
            </div>
        </div>
    </header>
    <div class="row mt-4">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success"><?php echo $message ?></div>
                <?php } ?>
                <div class="card-header">
                    <center>
                        <h3>ADD REVIEWS</h3>
                    </center>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <table class="table table-borderless">
                            <tr>
                                <td>ADD REVIEW TEXT</td>
                                <td>
                                    <textarea rows='3' class="form-control" name='desc' placeholder="Add Reviews"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="" class="form-group"><input type="submit" name="add_reviews" value="ADD REVIEWS" class="btn btn-primary w-100 bg-gradient">
                                </td>
                            </tr>

                        </table>
                    </form>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <center>
                        <h4>PREVIOUS REVIEWS</h4>
                    </center>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Feedback</th>
                        </tr>
                        <?php

                        $result = mysqli_query($conn, "SELECT * FROM reviews WHERE tutorId=" . $_GET['tutor']);
                        while ($row = mysqli_fetch_array($result)) {  ?>

                            <tr>
                                <td> <?php echo $row['review'] ?> </td>
                            </tr>
                        <?php  } ?>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-lg-4">

        </div>
    </div>

</body>

</html>