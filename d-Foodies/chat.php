<?php
include 'db.php';
session_start();
$owner = $_GET['owner'];
$customerId = $_SESSION['customerId'];
if (isset($_POST['add_rating'])) {
    $rating = $_POST['rating'];
    $query = "INSERT INTO ratings(rating,custId,owner) VALUES ('$rating' , '$customerId' , '$owner')";
    mysqli_query($conn, $query);
}
if (isset($_POST['addQues'])) {
    $customerId = $_SESSION['customerId'];
    $query = $_POST['query'];
    $insertQusestion = "insert into messages(question,owner,custId,reply) values('$query', '$owner' , '$customerId' , 'Not Answered Yet')";
    mysqli_query($conn, $insertQusestion);
    header("location:chat.php?" . $owner);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FOODIES.COM
    </title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .cust-height {
            height: 60px;
        }

        .color-cust {
            color: white;
        }

        color-cust:hover {
            background-color: red;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">

                <a href="index.php" target="main"><img src="images/logo3.png" width="180px" height="60px" align="left"></a>
            </div>

            <div class="col-10">
                <?php include 'nav.php' ?>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row py-4">
                <div class="col-md-12">
                    <center>
                        <h4 class="text-success">CHAT WITH OWNER</h4>
                    </center>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <center>
                                <h4 class="text-dark">SEND MESSAGE TO OWNER</h4>
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <?php if (!empty($_SESSION['customerId'])) {
                                    ?>
                                        <form method="post">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td><textarea class="form-control" rows="7" name="query"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="submit" class="btn btn-primary bg-gradient" name="addQues" value="SEND MESSAGE TO OWNER"></td>
                                                </tr>
                                            </table>
                                        </form>
                                    <?php } ?>
                                </div>
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="text-dark">Message Box</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table text-dark">
                                                <tr>
                                                    <th>Message </th>
                                                    <th>Reply</th>
                                                </tr>
                                                <?php
                                                $result_message = $result = mysqli_query($conn, "SELECT * FROM messages WHERE owner='$owner' AND custId='$customerId'");
                                                while ($row_message =  mysqli_fetch_assoc($result_message)) { ?>
                                                    <tr>
                                                        <td><?php echo $row_message['question']; ?></td>
                                                        <td><?php echo $row_message['reply']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>