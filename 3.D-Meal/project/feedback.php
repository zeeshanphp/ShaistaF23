<?php
session_start();
include 'db.php';
$foodId = $_GET['feedback'];
$userId = "1";
if (isset($_POST['add_feedback'])) {
    $feedback = $_POST['feedback'];
    $userId = $_POST['userId'];
    $foodId = $_POST['foodId'];
    $result = mysqli_query($conn, "SELECT * FROM feedback WHERE userId = '$userId' AND pId='$foodId'");
    $count = mysqli_num_rows($result);
    if ($count >= 1) {
        echo "<script>alert('You Have Already Submitted Your Feedback To This Book')</script>";
    } else {
        mysqli_query($conn, "INSERT INTO feedback (feedback,userId,pId) VALUES('$feedback' , '$userId' , '$foodId')");
    }
}
include 'header.php';
?>
<section class="bg-primary" style="padding-top: 7.0rem;padding-bottom: 5.0rem;">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h1 class="text-white">ADD FEEDBACK</h1>
            </center>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <form action="" method="post">
                <table class="table">
                    <tr>
                        <td style="vertical-align:middle;"><b>Your Feedback</b></td>
                        <td><textarea name="feedback" class="form-control" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" class="form-control" name="foodId" value=<?php echo $foodId; ?> required /></td>
                        <td><input type="hidden" class="form-control" name="userId" value=<?php echo $userId; ?> required /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Add Feedback" name="add_feedback" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
            <div class="col-md-12">
                <center>
                    <h4>Previous Feedback</h4>
                </center>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM feedback WHERE pId='$foodId'");

                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <table class="table table-striped">

                        <tr>
                            <td><?php echo $row['feedback']; ?></td>
                        </tr>
                    </table>
                <?php } ?>
            </div>

        </div>

    </div>
</div>

<?php
include 'footer.php';
?>