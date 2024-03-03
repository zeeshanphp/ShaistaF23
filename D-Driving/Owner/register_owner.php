<?php
include 'db.php';
$message = "";

if (isset($_POST['add_owner'])) {
    $fullname = $_POST['oname'];
    $phone = $_POST['ophone'];
    $email = $_POST['oemail'];
    $pass = $_POST['opass'];
    $username = $_POST['ouname'];
    $query = "insert into  owner(username,fullname,pass,email,phone) values('$username','$fullname','$pass','$email','$phone')";
    mysqli_query($conn, $query);
    $message = "Owner Registered Successfully<a href='index.php'>Go To Login Page</a>";
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Driving School Booking Portal
    </title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <nav class="nav-back py-2">
        <?php include 'toptext.php' ?>
    </nav>
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="container mt-4">
                <div class="row py-4">
                    <div class="col-md-3 py-4" style="">
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <?php if ($message != "") { ?>
                                <div class="alert alert-success bg-gradient"><?php echo $message ?></div>
                            <?php } ?>
                            <div class="card-header">
                                <h5 class="">
                                    <center><b>REGISTER AS SCHOOL OWNER</b></center>
                                </h5>
                            </div>
                            <div class="card-body">

                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group py-3">
                                        <input type="text" class="form-control" name="oname" placeholder="Enter Onwer Name" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="oemail" placeholder="Enter Onwer Email Adress" required />
                                    </div>
                                    <div class="form-group py-3">
                                        <input type="text" class="form-control" name="ouname" placeholder="Enter Onwer Username " required />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="opass" placeholder="Enter Password For Onwer" required />
                                    </div>
                                    <div class="form-group py-3">
                                        <input type="text" class="form-control" name="ophone" placeholder="Enter Onwer Phone Number" required />
                                    </div>


                                    <div class="form-group form-button">
                                        <input type="submit" name="add_owner" class="btn btn-success bg-gradient w-100 rounded" value="Register As Owner" />
                                    </div>

                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>