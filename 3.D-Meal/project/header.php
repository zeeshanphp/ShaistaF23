
<!DOCTYPE html>
<html>

<head>
    <title>Happy Meal</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />

</head>


<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container-fluid"><a class="navbar-brand d-inline-flex" href="index.html"><img class="d-inline-block" src="assets/img/gallery/logo.svg" alt="logo" /><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">Happy Meal</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
                        <li class="nav-item">
                            <a class="nav-link text-warning" aria-current="page" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="#">PRODUCTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="Admin/">ADMIN PANNEL</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                CATEGORIES
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM categories");
                                while ($row = mysqli_fetch_array($result)) {  ?>
                                    <li><a class="dropdown-item text-warning" href="categories.php?category=<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="#" tabindex="-1" aria-disabled="true">CONATCT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="#" tabindex="-1" aria-disabled="true">ABOUT US</a>
                        </li>
                    </ul>
                    <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0">
                        <?php if (empty($_SESSION['userId'])) { ?>
                            <a class="btn btn-white shadow-warning text-warning" href="login.php"> <i class="fas fa-user me-2"></i>Login/Register</a>
                        <?php } else { ?>
                            <a class="btn btn-danger shadow-danger text-white" href="logout.php"> <i class="fas fa-user me-2"></i>Logout</a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </nav>