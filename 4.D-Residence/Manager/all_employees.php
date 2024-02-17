<?php
include 'db.php';
$query = "SELECT * FROM employees";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

//SUM OF SALARIES
$sumSalaryQuery = "SELECT SUM(salary) as totalSalaries FROM employees";
$totalSalariesResult = mysqli_query($conn, $sumSalaryQuery);
$resultSalaries = mysqli_fetch_assoc($totalSalariesResult);

$message = "";

include 'header.php';

?>

<div class="row px-0 mx-0">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-info bg-gradient">
                <b>
                    <center>
                        ALL EMPLOYEES
                    </center>
                </b>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="table-active bg-gradient">
                            <th>Employer Name</th>
                            <th>Employer Phone</th>
                            <th>Employer Email</th>
                            <th>Employer Salary</th>
                            <th>Employer Occupation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['fullname'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['salary'] ?></td>
                                <td><?php echo $row['occupation'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-dark text-white">
                            <td colspan="5">
                                <center> <b> Total Salaries: <?php echo $resultSalaries['totalSalaries'] ?></b></center>
                            </td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>