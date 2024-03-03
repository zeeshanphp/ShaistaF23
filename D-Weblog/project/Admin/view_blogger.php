<?php
include 'db.php';
$message = "";
$blogger = $_GET['blogger'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$blogger'");
$row = mysqli_fetch_array($result);
if (isset($_POST['report_blogger'])) {
    $report = $_POST['report'];
    mysqli_query($conn, "INSERT INTO notifications(bloggerId , notification) VALUES('$blogger' , '$report')");
    header('location: users_reports.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                <div class="card">
                    <div class="card-header"> <b>
                            <center>BLOGGER PROFILE</center>
                        </b> </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>Username:</td>
                                <td><?php echo $row['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Fullname:</td>
                                <td><?php echo $row['fullname']; ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><?php echo $row['phone']; ?></td>
                            </tr>
                            <tr>
                                <td>City:</td>
                                <td><?php echo $row['city']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <?php if ($message != "") { ?>
                                    <div class="alert alert-success"><?php echo $message ?></div>
                                <?php } ?>
                                <center>
                                    <h4>SEND NOTIFICATION TO BLOGGER </h4>
                                </center>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">

                                    <tr>
                                        <td style="vertical-align: middle;"><b>Report Your Concern</b></td>
                                        <td>
                                            <textarea name="report" id="" class="form-control" rows="10" placeholder="Report Blogger"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="report_blogger" class="btn-primary rounded bg-gradient btn w-100" value="Send Report" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>