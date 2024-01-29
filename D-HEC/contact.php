<?php
include 'db.php';
if (isset($_POST['contact_us'])) {
    $fullname = $_POST['fname'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    $query = "INSERT INTO contactus(fullname,message,email) VALUES('$fullname' , '$message' , '$email')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Message Sent To Admin Of Website')</script>";
    }
}
include 'header.php';
?>

<div class="container-fluid px-0">
    <center>
        <h1 class="text-primary">CONTACT US</h1>
    </center>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
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
                        <td><b>Enter Your Message</b></td>
                        <td>
                            <textarea name="message" id="" class="form-control" cols="80" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="contact_us" class="btn btn-info w-100" value="CONTACT US" /></td>
                    </tr>
                </table>
            </form>

        </div>
    </div>
    <?php
    include 'footer.php';
    ?>