<?php
include 'db.php';
session_start();
$seller = $_SESSION['seller'];
$categories = "SELECT * FROM buyer_queries WHERE sellerId='$seller'";

if (isset($_POST['send_reply'])) {
    $questionId = $_POST['qId'];
    $reply = $_POST['reply'];
    mysqli_query($conn, "UPDATE buyer_queries SET reply='$reply' WHERE qId='$questionId'");
    header('location:view_messages.php');
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

        .cust-bg {
            background: #222d32;
        }

        .nav-back {
            background: #3c8dbc;
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
                <h4>SELLER PANNEL &nbsp ONLINE USED CARS SALE AND PURCHASE SYSTEM </h4>
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
                <table class="table text-dark">
                    <tr>
                        <th>Message </th>
                        <th>Reply</th>
                    </tr>
                    <?php
                    $result_message = $result = mysqli_query($conn, "SELECT * FROM buyer_queries WHERE sellerId='$seller'");
                    while ($row_message =  mysqli_fetch_assoc($result_message)) { ?>
                        <form method="post">
                            <tr>
                                <td><?php echo $row_message['question']; ?></td>
                                <td><input type="text" class="form-control" name="reply" value="<?php echo $row_message['reply']; ?>" required /></td>
                                <td><input type="hidden" name="qId" value="<?php echo $row_message['qId']; ?>"></td>
                                <td><input type="submit" name="send_reply" class="btn rounded bg-gradient btn-primary w-100" value="Add Reply" /></td>
                            </tr>
                        </form>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
</body>

</html>