<?php
include 'db.php';
session_start();

if (empty($_SESSION['custId'])) {
    echo "<script>alert('Please Login To Continue'); window.location.href = 'login.php';</script>";
}
$id = $_GET['feedback'];
$userId = $_SESSION['custId'];
if (isset($_POST['add_feedback'])) {
    $feedback = $_POST['feedback'];
    $pId = $_POST['pId'];
    $result = mysqli_query($conn, "SELECT * FROM feedback WHERE custId = '$userId' AND pId='$pId'");
    $count = mysqli_num_rows($result);
    if ($count >= 1) {
        echo "<script>alert('You Have Already Submitted Your Feedback To This Product')</script>";
    } else {
        mysqli_query($conn, "INSERT INTO feedback (feedback,custId,pId) VALUES('$feedback' , '$userId' , '$pId')");
    }
}
include 'header.php'
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <table class="table">
                    <tr>
                        <td style="vertical-align:middle;"><b>Your Feedback</b></td>
                        <td><textarea name="feedback" class="form-control" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" class="form-control" name="pId" value=<?php echo $id; ?> required /></td>
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
                $result = mysqli_query($conn, "SELECT * FROM feedback f JOIN users u on f.custId=u.userId WHERE f.pId='$id'");

                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="card mt-3">
                        <div class="card-header">
                            <b> <?php echo $row['fullname']; ?></b>
                        </div>
                        <div class="card-body">
                            <?php echo $row['feedback']; ?>
                        </div>
                    </div>

                <?php } ?>
            </div>

        </div>
    </div>
</div>

<?php
include 'footer.php'
?>