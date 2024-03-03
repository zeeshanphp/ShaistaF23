<?php
include 'db.php';
session_start();
$id = $_GET['profile'];
$result = mysqli_query($conn, "SELECT * FROM instructor i JOIN schools s ON i.schoolId=s.schoolId WHERE i.instructorId='$id'");
$row = mysqli_fetch_array($result);

if (isset($_POST['add_rating'])) {
    if (empty($_SESSION['studentId'])) {
        echo "<script>alert('Please Login To Continue'); window.location.href = 'login.php';</script>";
    } else {
        $studentId = $_SESSION['studentId'];
        $rating = $_POST['rating'];
        $query = "INSERT INTO ratings(rating,custId,instId) VALUES ('$rating' , '$studentId' , '$id')";
        mysqli_query($conn, $query);
    }
}
if (isset($_POST['add_reviews'])) {
    if (empty($_SESSION['studentId'])) {
        echo "<script>alert('Please Login To Continue'); window.location.href = 'login.php';</script>";
    } else {
        $studentId = $_SESSION['studentId'];

        $reviews = $_POST['reviews'];
        $instId = $_POST['instId'];
        $result = mysqli_query($conn, "SELECT * FROM reviews WHERE studentId = '$studentId' AND isntId='$instId'");
        $count = mysqli_num_rows($result);
        if ($count >= 1) {
            echo "<script>alert('You Have Already Submitted Your Review To This Instructor')</script>";
        } else {
            mysqli_query($conn, "INSERT INTO reviews (reviews,studentId,isntId) VALUES('$reviews' , '$studentId' , '$instId')");
            header('location: view_profile.php?profile=' . $id);
        }
    }
}
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="Owner/images/<?php echo $row['photo'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3"><?php echo $row['fname']; ?></h5>
                    <p class="text-muted mb-1"><?php echo $row['expertise']; ?></p>
                    <p class="text-muted mb-4"><?php echo $row['city']; ?></p>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary w-100">Request Booking</button> <br>
                    </div>
                    <?php
                    $sql = "SELECT AVG(rating) as average_rating
                    FROM ratings
                    WHERE instId =" . $id;
                    $result_av = mysqli_query($conn, $sql);
                    $average_rating = mysqli_fetch_assoc($result_av);
                    ?>

                    <form action="" method="post">
                        <div id="rateYo" data-rateYo-rating='<?php echo $average_rating['average_rating'] ?>'>
                        </div>
                        <input type="hidden" name="rating" id="rating">
                        <br>
                        <input type="submit" value="Give Rating" name="add_rating" class="btn btn-info">
                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row['fname']; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row['email']; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row['phone']; ?></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row['city']; ?></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Expertise</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row['expertise']; ?></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">School Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row['dname']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


            </div>
        </div>
    </div>
    <div class="row">
        <?php if (!empty($_SESSION['studentId'])) { ?>
            <form action="" method="post">
                <table class="table table-borderless">
                    <tr>
                        <td style="vertical-align:middle;"><b>Your Reviews</b></td>
                        <td><textarea name="reviews" class="form-control" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="hidden" class="form-control" name="instId" value=<?php echo $id; ?> required /></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Add Reviews" name="add_reviews" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
        <?php } ?>
        <div class="col-md-12">
            <center>
                <h4>Previous Reviews</h4>
            </center>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM reviews f JOIN students s on f.studentId=s.studentId WHERE f.isntId ='$id'");

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="card my-3">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td> <b class="text-dark"> <?php echo $row['fname']; ?></b></td>
                            </tr>
                            <tr>
                                <td> <span class="text-dark"><?php echo $row['reviews']; ?></span> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php

        ?>
    </div>
</div>
<?php
include 'footer.php'
?>