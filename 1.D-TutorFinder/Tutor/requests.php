<?php
session_start();
if (empty($_SESSION['tutor'])) {
    header('location:index.php');
}
include "../connection.php";
$id = $_SESSION['tutor'];
$query = "SELECT * FROM hiering JOIN students on hiering.studentId= students.studentId WHERE hiering.tutorId='$id' ";
$result = mysqli_query($conn, $query);

?>
<html>

<head>
    <title>TUTOR FINDER</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-success bg-gradient">
                <center>
                    <h1>TUTOR PANNEL</h1>
                </center>
            </div>
        </div>
        <div class="row">
            <div id="" class="col-md-2 bg-success bg-gradient">

                <?php include 'nav.php' ?>

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <center>ALL REQUESTS MADE BY STUDENTS</center>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Student Name</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {

                                ?>
                                    <tr>
                                        <td><?php echo $row['fullname'] ?></td>
                                        <td><?php echo $row['book_date'] ?></td>
                                        <td><?php echo $row['status'] ?></td>

                                    </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>