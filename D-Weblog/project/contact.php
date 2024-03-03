<?php
include 'db.php';
session_start();

include 'header.php'

?>
<div class="row">
    <div class="col-md-12 bg-info py-3">
        <center>
            <h4 class="text-white">
                CONTACT US
            </h4>
        </center>
    </div>
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
                        <textarea name="message" id="" class="form-control" rows="10"></textarea>
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


<?php include 'footer.php' ?>