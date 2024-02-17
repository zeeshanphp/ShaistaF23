<?php
include 'db.php';
$message = "";

if (isset($_POST['add_employee'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $occupation = $_POST['occupation'];
    $salary = $_POST['salary'];
    $adress = $_POST['adress'];
    $query = "insert into  employees(occupation,fullname,salary,email,phone,adress)
     values('$occupation','$fullname','$salary','$email','$phone','$adress')";
    mysqli_query($conn, $query);
    $message = "Employee Added Successfully";
}

include 'header.php';

?>

<div class="row px-0 mx-0">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-6">
        <div class="card">
            <?php if ($message != "") { ?>
                <div class="alert alert-success"><?php echo $message ?></div>
            <?php } ?>
            <div class="card-header bg-info bg-gradient">
                <b>
                    <center>
                        ADD EMPLOYEES
                    </center>
                </b>
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
                            <td><b>Enter Phone</b></td>
                            <td><input type="text" class="form-control" name="uphone" placeholder="Enter User Phone Number" required /></td>
                        </tr>
                        <tr>
                            <td><b>Enter Adress</b></td>
                            <td><input type="text" class="form-control" name="adress" placeholder="Enter Adress" required /></td>
                        </tr>
                        <tr>
                            <td><b>Occupation</b></td>
                            <td><input type="text" class="form-control" name="occupation" placeholder="Enter Occupation" required /></td>
                        </tr>
                        <tr>
                            <td><b>Salary</b></td>
                            <td><input type="number" class="form-control" name="salary" placeholder="Enter Salary" required /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="add_employee" class="cust-btn-in btn btn-block" value="Add Employees" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>