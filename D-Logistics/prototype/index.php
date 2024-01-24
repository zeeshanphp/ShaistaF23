<?php
include 'db.php';
session_start();
$message = "";
$error = "";
if (isset($_POST['add_employee'])) {

    $empname = $_POST['ename'];
    $empadress = $_POST['eadress'];
    $empsalary = $_POST['esalary'];
    $empdesg = $_POST['edesg'];

    $query = "INSERT INTO employee(emp_name,emp_adress,emp_salary,emp_designation) VALUES('$empname','$empadress','$empsalary','$empdesg')";
    if (mysqli_query($conn, $query)) {
        $message = " <b> User Registered Successfully";
    }
}
include 'header.php'

?>
<div class="row mt-5">

    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form method="POST" enctype="multipart/form-data">
            <div class="card">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success"><?php echo $message ?></div>
                <?php } ?>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td><b>Employee Name</b></td>
                            <td><input type="text" class="form-control" name="ename" placeholder="Enter Employee" required /></td>
                        </tr>
                        <tr>
                            <td><b>Employee Adress</b></td>
                            <td>
                                <input type="text" class="form-control" name="eadress" placeholder="Enter Employee Adress" required />
                            </td>
                        </tr>
                        <tr>
                            <td><b>Employee Designation</b></td>
                            <td><input type="text" class="form-control" name="edesg" placeholder="Enter Employee Designation" required /></td>
                        </tr>
                        <tr>
                            <td><b>Employee Salary</b></td>
                            <td><input type="text" class="form-control" name="esalary" placeholder="Enter Employee Salary" required /></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <table class="table bg-transparent">
                        <tr>
                            <td><input type="submit" name="add_employee" class="btn-primary rounded bg-gradient btn w-100" value="Add/Save" /></td>
                            <td><a href="search.php" class="btn btn-warning bg-gradient rounded w-100">Update</a></td>
                            <td><a href="search.php" class="btn btn-success bg-gradient rounded w-100">Search</a></td>
                            <td><a href="" class="btn btn-danger bg-gradient rounded w-100">Delete</a></td>
                        </tr>
                    </table>
                </div>
            </div>

        </form>
    </div>
</div>


<?php include 'footer.php' ?>