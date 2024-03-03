<?php
include 'db.php';
session_start();
$userId = $_SESSION['userId'];
$message = "";
if (isset($_POST['add_blog'])) {
    $folder = 'blogs/';
    $folder = $folder . basename($_FILES['pimage']['name']);
    move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
    $img = $_FILES['pimage']['name'];
    $title = mysqli_real_escape_string($conn,  $_POST['btitle']);
    $cat = mysqli_real_escape_string($conn,  $_POST['bcat']);
    $title = mysqli_real_escape_string($conn,  $_POST['btitle']);
    $bdesc = mysqli_real_escape_string($conn,  $_POST['bdesc']);
    $query = "INSERT INTO blogs(btitle,bcat,bpic,blog,writer)VALUES('$title','$cat','$img','$bdesc','$userId')";
    if (mysqli_query($conn, $query)) {
        // $subscribers = mysqli_query($conn, "SELECT userId FROM subscribers");
        // while ($row = mysqli_fetch_array($subscribers)) {
        //     $userId = $row['userId'];
        //     $email = mysqli_query($conn, "SELECT email FROM users WHERE user_id='$userId'");
        //     $get_email = mysqli_fetch_array($email);
        //     $message = " <b>A New Blog ".$title." is added please view </b>";
        //     $to = $get_email['email'];
        //     $subject = "New Blogs In Webbloger";
        //     $txt = " <b>A New Blog ".$title." is added please view </b>";
        //     $headers = "From: zeeshancs619@gmail.com";
        //     mail($to, $subject, $txt, $headers);
        // }
        $message = "Blog Sent to admin for approval";
    }
}
include 'header.php'
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <?php if ($message != "") { ?>
                            <div class="alert alert-success"><?php echo $message ?></div>
                        <?php } ?>
                        <center>
                            <h4>ADD BLOG</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Blog Title</b></td>
                                <td><input type="text" class="form-control" name="btitle" placeholder="Enter Blog Title" required /></td>
                            </tr>
                            <tr>
                                <td><b>Blog Pic</b></td>
                                <td>
                                    <input type="file" class="form-control" name="pimage" required />
                                </td>
                            </tr>
                            <tr>
                                <td><b>Blog Category</b></td>
                                <td><input type="text" class="form-control" name="bcat" placeholder="Enter Blog Category " required /></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;"><b>Blog Description</b></td>
                                <td>
                                    <textarea name="bdesc" id="" class="form-control" rows="10" placeholder="Enter Blog Details"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="add_blog" class="btn-primary rounded bg-gradient btn w-100" value="Add Blog" /></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php'
?>