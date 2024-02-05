<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sidebars.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 py-2 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin Pannel</a>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class=" btn btn-danger rounded px-3" href="logout.php">Sign out</a>
            </div>
        </div>
    </header>