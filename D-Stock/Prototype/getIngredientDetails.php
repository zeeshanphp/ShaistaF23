<?php
include 'db.php';
if (isset($_POST['ingId'])) {
    $ingId = $_POST['ingId'];

    $query = "SELECT * FROM ingredients WHERE ingId = $ingId";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_array($result)) {
        echo $price = $row['price'];
    } else {
        echo "No details found for the selected ingredient.";
    }
} else {
    echo "Invalid request.";
}
