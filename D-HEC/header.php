<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Portal for Higher Education Institutes (HEIs)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-primary bg-gradient">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-fill me-auto mb-2 mb-lg-0 w-100">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="faculities.php">Faculities</a>
                    </li>

                    <?php if (empty($_SESSION['studentId'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contact.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Faculity/">Faculity Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Admin/">Admin Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="register.php">Login</a>

                        </li>
                    <?php  } else { ?>
                        <li class="nav-item">
                            <a class="nav-link text-white btn btn-danger rounded" href="logout.php">Logout</a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
    </nav>