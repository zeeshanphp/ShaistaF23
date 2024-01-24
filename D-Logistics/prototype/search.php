<?php
include 'db.php';
session_start();
$message = "";
$error = "";
if (isset($_POST['update_employee'])) {

    $empname = $_POST['ename'];
    $empadress = $_POST['eadress'];
    $empsalary = $_POST['esalary'];
    $empdesg = $_POST['edesg'];
    $employeeId = $_POST['employeeId'];

    $query = "UPDATE employee SET emp_name='$empname',emp_adress='$empadress',emp_salary='$empsalary',emp_designation='$empdesg' WHERE empId='$employeeId'";
    if (mysqli_query($conn, $query)) {
        $message = " <b> Employee Record Updated Successfully.... <a href='search.php' class='btn btn-info bg-gradient'>Go To Search</a> </b>";
    }
}
if (isset($_POST['delete_employee'])) {
    $employeeId = $_POST['employeeId'];
    // delete query
    $sql = "DELETE FROM employee WHERE empId='$employeeId'";
    mysqli_query($conn, $sql);
    $message = " <b> Employee Record Deleted Successfully.... <a href='index.php' class='btn btn-primary rounded bg-gradient'>Add New Employee</a> </b>";
}
include 'header.php'

?>
<div class="row mt-5">

    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <?php if ($message != "") { ?>
                <div class="alert alert-success"><?php echo $message ?></div>
            <?php } ?>
            <div class="card-body">
                <form method="post">
                    <table class="table">
                        <tr>
                            <td>
                                <select name="empId" class="form-control">
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM employee");
                                    while ($row = mysqli_fetch_array($result)) {  ?>
                                        <option value="<?php echo $row['empId'] ?>"><?php echo $row['empId'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="submit" name="nsearch" value="SEARCH USER" class="btn btn-info rounded bg-gradient"></td>
                        </tr>
                    </table>
                </form>
                <?php
                if (isset($_POST['nsearch'])) {
                    $find = $_POST['empId'];
                    $query = "select * from employee where empId='$find'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                ?>
                    <form method="POST" enctype="multipart/form-data">

                        <table class="table table-borderless">
                            <tr>
                                <td><input type="hidden" name="employeeId" value="<?php echo $row['empId']; ?>"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Employee Name</b></td>
                                <td><input type="text" class="form-control" name="ename" value="<?php echo $row['emp_name']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td><b>Employee Adress</b></td>
                                <td>
                                    <input type="text" class="form-control" name="eadress" value="<?php echo $row['emp_adress']; ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <td><b>Employee Designation</b></td>
                                <td><input type="text" class="form-control" name="edesg" value="<?php echo $row['emp_designation']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td><b>Employee Salary</b></td>
                                <td><input type="text" class="form-control" name="esalary" value="<?php echo $row['emp_salary']; ?>" required /></td>
                            </tr>
                        </table>
            </div>
            <div class="card-footer">
                <table class="table">
                    <tr>
                        <td><a href="index.php" class="btn btn-primary bg-gradient rounded w-100">Add/Save</a></td>
                        <td><input type="submit" name="update_employee" class="btn-warning rounded bg-gradient btn w-100" value="Update" /></td>
                        <td><a href="search.php" class="btn btn-success bg-gradient rounded w-100">Search</a></td>
                        <td><input type="submit" name="delete_employee" class="btn-danger rounded bg-gradient btn w-100" value="Delete" /></td>
                    </tr>
                </table>
            </div>
        </div>

        </form>
    <?php } ?>
    </div>
</div>


<?php include 'footer.php' ?>