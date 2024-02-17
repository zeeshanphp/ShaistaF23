<?php
include 'db.php';
if (isset($_POST['add_complain'])) {
    $fullname = $_POST['fname'];
    $complain = $_POST['complain'];
    $email = $_POST['email'];
    $query = "INSERT INTO complains(fullname,complain,email) VALUES('$fullname' , '$complain' , '$email')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Complain Sent To Admin Of Website')</script>";
    }
}

include 'header.php';
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <center>
                    <h4>Add Complain</h4>
                </center>
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
                            <td><input type="text" class="form-control" name="email" placeholder="Enter User Email Adress" required /></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;"><b>Enter Your Complain</b></td>
                            <td>
                                <textarea name="complain" id="" class="form-control" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="add_complain" class="btn btn-info bg-gradient rounded text-white w-100" value="SEND COMPLAIN" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>


    </div>
</div>

<?php
include 'footer.php'
?>