<?php
include 'db.php';
session_start();
$id = $_GET['id'];

if (isset($_POST['add_rating'])) {
    $customerId = $_SESSION['customerId'];
    $rating = $_POST['rating'];
    $query = "INSERT INTO ratings(rating,custId,sellerId) VALUES ('$rating' , '$customerId' , '$id')";
    mysqli_query($conn, $query);
}
if (isset($_POST['addQues'])) {
    $customerId = $_SESSION['customerId'];
    $query = $_POST['query'];
    $insertQusestion = "insert into buyer_queries(question,sellerId,custId,reply) values('$query', '$id' , '$customerId' , 'Not Answered Yet')";
    mysqli_query($conn, $insertQusestion);
    header("location:view_seller.php?" . $id);
}
?>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <style>
        body {
            color: #f8f9d2;

            background-color: #2d3436;
            background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);
        }

        h4 {
            color: #f8f9d2;
        }

        hr {
            background-color: #f8f9d2;
        }

        ul li a {
            color: #f8f9d2;
        }

        ul li:hover {
            background: #f8f9d2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-2 m-0 p-0">
                <img src="images/logo.png" width="100%" />
            </div>
            <div class="col-md-10">
                <?php include 'nav.php'; ?>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

            </div>
            <div class="col-md-3">
                <?php
                $sql = "SELECT AVG(rating) as average_rating
                    FROM ratings WHERE sellerId ='$id'";
                $result_av = mysqli_query($conn, $sql);
                $average_rating = mysqli_fetch_assoc($result_av);
                ?>
                <div id="rateYo" data-rateYo-rating="<?php echo $average_rating['average_rating'] ?>">
                </div>
                <form action="" method="post">



                    <br><b class="text-white">Rating: <?php echo $average_rating['average_rating']; ?></b>
                    <input type="hidden" name="rating" id="rating">
                    <input type="hidden" name="nutId" value="<?php echo 3; ?>">
                    <br>
                    <?php if (!empty($_SESSION['customerId'])) {
                    ?>
                        <input type="submit" value="Give Rating" name="add_rating" class="btn btn-info">
                    <?php } ?>
                </form>


            </div>
            <div class="col-md-6">
                <?php $result = mysqli_query($conn, "SELECT * FROM users WHERE custId='$id'");
                $row = mysqli_fetch_array($result);
                ?>
                <div class="card">
                    <div class="card-header text-dark">
                        <center> <b> SELLER INFO </b></center>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless text-dark">
                            <tr>
                                <td>Fullname</td>
                                <td><?php echo $row['fullname']; ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><?php echo $row['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Email Adress</td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Contact</td>
                                <td><?php echo $row['phone']; ?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><?php echo $row['city']; ?></td>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h4 class="text-dark">SEND MESSAGE TO SELLER</h4>
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
                                                <td><input type="submit" class="btn btn-primary bg-gradient" name="addQues" value="SEND MESSAGE TO SELLER"></td>
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
                                            $result_message = $result = mysqli_query($conn, "SELECT * FROM buyer_queries WHERE sellerId='$id'");
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function() {

            $("#rateYo").rateYo({
                onSet: function(rating, rateYoInstance) {
                    $('#rating').val(rating);
                }
            });

        });
    </script>
</body>

</html>