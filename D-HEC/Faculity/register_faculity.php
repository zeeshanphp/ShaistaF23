<?php
include 'db.php';
$message = "";

if (isset($_POST['add_user'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    $query = "insert into  faculity_member(username,fullname,password,email,phone,city) values('$username','$fullname','$pass','$email','$phone','$city')";
    mysqli_query($conn, $query);
    $message = "<b>Faculity Member Registered Successfull &nbsp  <a href='index.php'>Go To Login Page</a> </b>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Faculity Porta</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <nav class="bg-primary bg-gradient text-white py-2">
        <?php include 'toptext.php' ?>
    </nav>
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="container mt-4">
                <div class="row py-4">
                    <div class="col-md-3 py-4">
                    </div>

                    <div class="col-md-6 py-2">
                        <?php if ($message != "") { ?>
                            <div class="alert alert-success bg-gradient text-success"><?php echo $message ?></div>
                        <?php } ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-primary">
                                    <center><b>REGISTER NEW FACLULITY </b></center>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><b>Enter FullName</b></td>
                                            <td><input type="text" class="form-control" name="fname" placeholder="Enter User FullName" required /></td>
                                        </tr>
                                        <tr>
                                            <td><b>Enter Email Adress</b></td>
                                            <td><input type="text" class="form-control" name="uemail" placeholder="Enter User Email Adress" required /></td>
                                        </tr>
                                        <tr>
                                            <td><b>Enter Username</b></td>
                                            <td><input type="text" class="form-control" name="uname" placeholder="Enter User Username " required /></td>
                                        </tr>
                                        <tr>
                                            <td><b>Enter Password</b></td>
                                            <td><input type="password" class="form-control" name="upass" placeholder="Enter Password For User" required /></td>
                                        </tr>
                                        <tr>
                                            <td><b>Enter Phone</b></td>
                                            <td><input type="text" class="form-control" name="uphone" placeholder="Enter User Phone Number" required /></td>
                                        </tr>
                                        <tr>
                                            <td><b>Enter City</b></td>
                                            <td><input type="text" class="form-control" name="ucity" placeholder="Enter User City" required /></td>
                                        </tr>
                                        <tr>
                                            <td><b>Select Faculity</b></td>
                                            <td> <select name="faculity" class="form-select">
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM faculities");
                                                    while ($row = mysqli_fetch_array($result)) {  ?>
                                                        <option value="<?php echo $row['faculityId'] ?>"><?php echo $row['faculity'] ?></option>
                                                    <?php } ?>
                                                </select></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><input type="submit" name="add_user" class="btn-primary bg-gradient btn w-100" value="Register Faculity Member" /></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>