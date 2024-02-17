<?php
include 'db.php';

$income_query = "SELECT SUM(amount) AS total_amount FROM payments";
$result_income = mysqli_query($conn, $income_query);
$total_income = mysqli_fetch_array($result_income);

$exp_query = "SELECT SUM(salary) AS total_expenses FROM employees";
$result_exp = mysqli_query($conn, $exp_query);
$total_exp = mysqli_fetch_array($result_exp);
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
                        ALL EXPENSES
                    </center>
                </b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card bg-success">
                            <div class="card-header text-white bg-gradient">
                                <center> <b> TOTAL INCOME </b></center>
                            </div>
                            <div class="card-body">
                                <center><b class="text-white py-3"> Rs. <?php echo $total_income['total_amount'] ?></b></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card bg-danger">
                            <div class="card-header text-white bg-gradient">
                                <center> <b>TOTAL EXPENSES</b> </center>
                            </div>
                            <div class="card-body">
                                <center><b class="text-white"> Rs. <?php echo $total_exp['total_expenses'] ?></b></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>