<?php

include 'db.php';
$message = "";
if (isset($_POST['add_member'])) {
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
    $query = "INSERT INTO users (name, father_name, email, cnic, phone, adress, dname, dfname, dphone, dtype, dadress) VALUES ('$name','$fname','$email','$cnic','$phone','$adress','$dname','$dfname','$dphone','$dtype' , '$dadress')";
    if (mysqli_query($conn, $query)) {
        $message = "User Added Successfully in database";
    }
}

include 'header.php'

?>
<div class="row">

    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success"><?php echo $message ?></div>
                <?php } ?>
                <center>
                    <h4>ADD USER</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <table class="table table-borderless mt-3">
                        <tr>
                            <td><b>Name:</b></td>
                            <td><input type="text" class="form-control" name="name" placeholder="Enter Name" required /></td>
                            <td><b>Email:</b></td>
                            <td><input type="text" class="form-control" name="email" placeholder="Enter Email" required /></td>

                        </tr>
                        <tr>
                            <td><b>Father Name:</b></td>
                            <td><input type="text" class="form-control" name="fname" placeholder="Enter Father Name" required /></td>
                            <td><b>CNIC:</b></td>
                            <td><input type="text" class="form-control" name="cnic" placeholder="Enter CNIC" required /></td>
                        </tr>

                        <tr>
                            <td><b>Adress:</b></td>
                            <td><input type="text" class="form-control" name="adress" placeholder="Enter Adress" required /></td>
                            <td><b>Contact:</b></td>
                            <td><input type="text" class="form-control" name="contact" placeholder="Enter Contact" required /></td>

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
                            <td><input type="text" class="form-control" name="dnme" placeholder="Enter Dispute Person Name" required /></td>
                            <td><b>Dispute Person Father Name:</b></td>
                            <td><input type="text" class="form-control" name="dfname" placeholder="Enter Dispute Person Fater Name" required /></td>

                        </tr>
                        <tr>
                            <td><b>Dispute Person Contact:</b></td>
                            <td><input type="text" class="form-control" name="dcontact" placeholder="Enter Dispute Person Contact" required /></td>
                            <td><b>Dispute Person Adress:</b></td>
                            <td><input type="text" class="form-control" name="dadress" placeholder="Enter Dispute Person Adress" required /></td>

                        </tr>
                        <tr>
                            <td><b>Dispute Type:</b></td>
                            <td colspan="3">
                                <select name="dtype" class="form-control" id="">
                                    <option>Select Dispute</option>
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
                            <td><input type="submit" name="add_member" class="btn btn-success bg-gradient rounded w-100" value="Add User"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</div>


<?php include 'footer.php' ?>