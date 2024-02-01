<?php
include 'db.php';
$ownerId = $_GET['edit'];
$result = mysqli_query($conn, "SELECT * FROM owner WHERE ownerId='$ownerId'");
$row = mysqli_fetch_array($result);
if (isset($_POST['add_owner'])) {
    $fullname = $_POST['oname'];
    $phone = $_POST['ophone'];
    $email = $_POST['oemail'];
    $pass = $_POST['opass'];
    $username = $_POST['ouname'];
    $query = "UPDATE  owner SET username='$username',fullname='$fullname',pass='$pass',email='$email',phone='$phone' WHERE ownerId='$ownerId'";

    mysqli_query($conn, $query);
    header("location:owners.php");
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
            <div class="col-md-6 mx-4 mt-4" style="background: #fff;">
                <h5 class="form-title text-color-in">
                    <center><b>ADD RESTAURANT OWNER</b></center>
                </h5>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="oname" value="<?php echo $row['fullname'] ?>" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="oemail" value="<?php echo $row['email'] ?>" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="ouname" value="<?php echo $row['username'] ?>" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="opass" value="<?php echo $row['pass'] ?>" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="ophone" value="<?php echo $row['phone'] ?>" required />
                    </div>


                    <div class="form-group form-button">
                        <input type="submit" name="add_owner" class="cust-btn-in btn btn-block" value="Update Restaurant Owner" />
                    </div>

                </form>

            </div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>