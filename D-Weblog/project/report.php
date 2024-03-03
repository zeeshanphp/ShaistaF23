<?php
include 'db.php';
session_start();
if (empty($_SESSION['userId'])) {
    echo "<script>alert('Please Login To Continue'); window.location.href = 'login.php';</script>";
}
$userId = $_SESSION['userId'];
$blogger = $_GET['blogger'];
$blogId = $_GET['blog'];
$message = "";
if (isset($_POST['report_blogger'])) {

    $report = mysqli_real_escape_string($conn,  $_POST['report']);
    $query = "INSERT INTO reports(userId,bloggerId,report,blogId)VALUES('$userId','$blogger','$report','$blogId')";
    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Blogger Reported..'); window.location.href = 'blogs.php';</script>";
    }
}
include 'header.php'
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <?php if ($message != "") { ?>
                            <div class="alert alert-success"><?php echo $message ?></div>
                        <?php } ?>
                        <center>
                            <h4>REPORT THIS BLOG</h4>
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

<?php
include 'footer.php'
?>