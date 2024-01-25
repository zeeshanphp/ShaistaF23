<?php
include 'db.php';
$message = "";
$id = $_GET['edit'];
$result = mysqli_query($conn, "SELECT * FROM members WHERE memberid='$id'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_user'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    $query = "UPDATE users SET username='$username',fullname='$fullname',pass='$pass',email='$email',phone='$phone',city='$city' WHERE userId='$id'";
    mysqli_query($conn, $query);
    header("location:manage_user.php");
}

include 'header.php';
?>
<div class="row mx-0 px-0">
    <div class="col-md-2 bg-primary text-white">
        <?php include 'nav.php' ?>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success"><?php echo $message ?></div>
                <?php } ?>
                <center>
                    <h4>UPDATE MEMBER</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for=""> <b>Fullname :</b> </label>
                        <input type="text" class="form-control" name="fname" value="<?php echo $row['fullname'] ?>" required />
                    </div>
                    <div class="form-group">
                        <label for=""> <b>Email :</b> </label>
                        <input type="text" class="form-control" name="uemail" value="<?php echo $row['email'] ?>" required />
                    </div>
                    <div class="form-group">
                        <label for=""> <b>Username :</b> </label>

                        <input type="text" class="form-control" name="uname" value="<?php echo $row['username'] ?>" required />
                    </div>

                    <div class="form-group">
                        <label for=""> <b>Phone No :</b> </label>

                        <input type="text" class="form-control" name="uphone" value="<?php echo $row['phone'] ?>" required />
                    </div>
                    <div class="form-group">
                        <label for=""> <b>City :</b> </label>

                        <input type="text" class="form-control" name="ucity" value="<?php echo $row['city'] ?>" required />
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="update_user" class="cust-btn-in btn btn-block" value="Update Member" />
                    </div>
                </form>
            </div>
        </div>


    </div>
    <div class="col-md-3"></div>
</div>
<?php
include 'footer.php';
?>