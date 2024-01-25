<?php
include 'db.php';
$message = "";

$id = $_GET['edit'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE userId='$id'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_user'])) {

    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];
    $adress = $_POST['adress'];
    $dname = $_POST['dnme'];
    $dfname = $_POST['dfname'];
    $dphone = $_POST['dcontact'];
    $dadress = $_POST['dadress'];
    $dtype = $_POST['dtype'];
    $query = "UPDATE users SET name='$name', father_name='$fname', email='$email', cnic='$cnic', phone='$phone', adress='$adress', dname='$dname', dfname='$dfname', dphone='$dphone', dtype='$dtype', dadress='$dadress' WHERE userId='$id'";
    if (mysqli_query($conn, $query)) {
        $message = "User Updated Successfully <a href='manage_users.php'> View Users </a>";
    }
}
include 'header.php';
?>
<div class="row mx-0 px-0">
    <div class="col-md-2 bg-primary text-white">
        <?php include 'nav.php' ?>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success"><?php echo $message ?></div>
                <?php } ?>
                <center>
                    <h4>UPDATE USER</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <table class="table table-borderless mt-3">
                        <tr>
                            <td><b>Name:</b></td>
                            <td><input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required /></td>
                            <td><b>Email:</b></td>
                            <td><input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" required /></td>

                        </tr>
                        <tr>
                            <td><b>Father Name:</b></td>
                            <td><input type="text" class="form-control" name="fname" value="<?php echo $row['father_name']; ?>" required /></td>
                            <td><b>CNIC:</b></td>
                            <td><input type="text" class="form-control" name="cnic" value="<?php echo $row['cnic']; ?>" required /></td>
                        </tr>

                        <tr>
                            <td><b>Adress:</b></td>
                            <td><input type="text" class="form-control" name="adress" value="<?php echo $row['adress']; ?>" required /></td>
                            <td><b>Contact:</b></td>
                            <td><input type="text" class="form-control" name="contact" value="<?php echo $row['phone']; ?>" required /></td>

                        </tr>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <h2 class="text-primary">DISPUTE DETAILS</h2>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Dispute Person Name:</b></td>
                            <td><input type="text" class="form-control" name="dnme" value="<?php echo $row['dname']; ?>" required /></td>
                            <td><b>Dispute Person Father Name:</b></td>
                            <td><input type="text" class="form-control" name="dfname" value="<?php echo $row['dfname']; ?>" required /></td>

                        </tr>
                        <tr>
                            <td><b>Dispute Person Contact:</b></td>
                            <td><input type="text" class="form-control" name="dcontact" value="<?php echo $row['dphone']; ?>" required /></td>
                            <td><b>Dispute Person Adress:</b></td>
                            <td><input type="text" class="form-control" name="dadress" value="<?php echo $row['dadress']; ?>" required /></td>

                        </tr>
                        <tr>
                            <td><b>Dispute Type:</b></td>
                            <td colspan="3">
                                <select name="dtype" class="form-control" id="">
                                    <option><?php echo $row['dtype']; ?></option>
                                    <option>Money/Loan</option>
                                    <option>Home</option>
                                    <option>Land</option>
                                    <option>Vehicle</option>
                                    <option>Assault</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" name="update_user" class="btn btn-success bg-gradient rounded w-100" value="Update User"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>


    </div>
    <div class="col-md-3"></div>
</div>
<?php
include 'footer.php';
?>