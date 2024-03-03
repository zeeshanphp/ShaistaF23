<!DOCTYPE html>
<html>

<head>
    <title>WEB BLOGER</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {}

        ul li a {
            color: rgba(160, 85, 146, 1);
        }
    </style>
</head>

<body>

    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-fill py-2 bg-primary bg-gradient">
                    <li class="nav-item"><a href="index.php" class="nav-link text-white">HOME</a></li>
                    <li class="nav-item"><a href="blogs.php" class="nav-link text-white">BLOGS</a></li>
                    <li class="nav-item"><a href="search.php" class="nav-link text-white">SEARCH BLOG</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link text-white">CONTACT US</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link text-white">ABOUT US</a></li>

                    <?php if (empty($_SESSION['userId'])) { ?>
                        <li class="nav-item"><a href="login.php" class="nav-link text-white">LOGIN</a></li>
                        <li class="nav-item"><a href="register.php" class="nav-link text-white">REGISTER</a></li>
                    <?php } else { ?>
                        <li class="nav-item dropdown bg-primary bg-gradient text-white">
                            <a class="nav-link dropdown-toggle  text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                MY ACCOUNT
                            </a>
                            <ul class="dropdown-menu bg-primary bg-gradient">
                                <li class="nav-item text-white active"><a href="add_blog.php" class="nav-link text-white">ADD BLOG</a></li>
                                <li class="nav-item"><a href="my_blogs.php" class="nav-link text-white">MY BLOGS</a></li>
                                <li class="nav-item"><a href="notification.php" class="nav-link text-white">NOTIFICATIONS</a></li>
                                <li class="nav-item"><a href="profile.php" class="nav-link text-white">MY PROFILE</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="logout.php" class="rounded btn btn-danger bg-gradient">LOGOUT</a></li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </div>