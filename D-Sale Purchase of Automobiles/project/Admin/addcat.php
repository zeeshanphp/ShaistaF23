<?php
include 'db.php';
if (isset($_POST['add_cat'])) {

    $catname = $_POST['catname'];
    $query = "insert into   categories(catname) values('$catname')";
    mysqli_query($conn, $query);
    header('location:mancat.php');
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Sale Purchase of Automobiles and Spare Parts</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background: #ecf0f5;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .nav-back,
        .cust-bg {
            background: #2d3436;
            color: #FFF;
        }

        ul li a {
            color: #b8c7ce;
        }

        ul li:hover {
            background: #636e72;
            color: #b8c7ce;
        }
    </style>
</head>

<body>
    <nav class="container-fluid py-3 nav-back">
        <div class="row">
            <div class="col-md-8">
                <h4>ADMIN PANNEL &nbsp&nbsp Sale Purchase of Automobiles and Spare Parts </h4>
            </div>
            <div class="col-md-4">
                <a href="logout.php" class="btn btn-danger float-right">Logout</a>
            </div>
        </div>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 cust-bg">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
                <form method="POST">

                    <table class="table">
                        <tr>
                            <td colspan="2" class="text-primary">
                                <center>
                                    <h5> ADD CATEGORY</h5>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>CATEGORY NAME</td>
                            <td><input type="text" class="form-control" name="catname" placeholder="Enter Category Name" required></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="add_cat" class="btn w-100 btn-dark" value="ADD CATEGORY" /></td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>

    </div>
</body>

</html>