<?php
include 'db.php';
session_start();
$find_query = "SELECT * FROM restaurants";
$result = mysqli_query($conn, $find_query);

if (isset($_POST['add_rating'])) {
    $customerId = $_SESSION['customerId'];
    $restaurantId = $_POST['restaurantId'];
    $rating = $_POST['rating'];
    $query = "INSERT INTO ratings(rating,custId,restaurantId) VALUES ('$rating' , '$customerId' , '$restaurantId')";
    mysqli_query($conn, $query);
    header('location: restaurants.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>FOODIES.COM
    </title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <style>
        .table td,
        .table th {
            padding: 0px;
        }

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
            <div class="col-md-12">
                <center class='text-success'>
                    <h2>ALL RESTAURANT</h2>
                </center>
            </div>
            <div class="row py-4">
                <?php
                while ($row = mysqli_fetch_array($result)) { ?>

                    <div class="col-md-4">
                        <table class="table table-borderless">
                            <tr>
                                <td colspan="2"> <img src="Owner/images/<?php echo $row['photo'] ?>" height="200" width="100%"> </td>
                            </tr>
                            <tr>
                                <td> <b>Restaurant</b> </td>
                                <td><?php echo $row['dname'] ?></td>
                            </tr>
                            <tr>
                                <td> <b>Contact</b> </td>
                                <td><?php echo $row['dphone'] ?></td>
                            </tr>
                            <tr>
                                <td> <b>Location</b> </td>
                                <td><?php echo $row['location'] ?></td>
                            </tr>
                            <tr>
                                <td>

                                    <form action="" method="post">
                                        <?php
                                        $sql = "SELECT AVG(rating) as average_rating FROM ratings WHERE restaurantId =" . $row['restaurantId'];
                                        $result_av = mysqli_query($conn, $sql);
                                        $average_rating = mysqli_fetch_assoc($result_av);
                                        ?>
                                        <div class="rateYo" data-rateYo-rating="<?php echo $average_rating['average_rating'] ?>">
                                        </div>
                                        <input type="hidden" name="rating" class="rating">
                                        <input type="hidden" name="restaurantId" value="<?php echo $row['restaurantId']; ?>">

                                        <input type="submit" value="Give Rating" name="add_rating" class="btn btn-info w-100">
                                    </form>
                                </td>
                            </tr>


                            <tr class="py-2">
                                <td colspan="2"> <a href="restaurant_menu.php?menu=<?php echo $row['restaurantId'] ?>" class="btn btn-success w-100 bg-gradient">View Menu</a> </td>
                            </tr>
                            <tr>
                                <td colspan="2"> <a href="chat.php?owner=<?php echo $row['owner'] ?>" class="btn btn-dark w-100 bg-gradient <?php if (empty($_SESSION['customerId'])) {
                                                                                                                                                echo 'disabled';
                                                                                                                                            } ?>">Chat With Owner</a> </td>
                            </tr>
                        </table>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function() {

            $(".rateYo").rateYo({
                onSet: function(rating, rateYoInstance) {
                    $('.rating').val(rating);
                }
            });

        });
    </script>
</body>


</html>