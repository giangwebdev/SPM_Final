<?php

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
$account = new account();
$account->check_Session();
?>
<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Supervisor Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">

</head>

<body>
<!-- Navigation -->
<?php require_once(SITE_ROOT."/template/header.php"); ?>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="home_supervisor.php"><img src="./image/Logo-FU-01.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../approve_pending_acc.php">Manage account request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=create_meeting_request&controller=supervisor">Create meeting request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=view_profile&controller=account">View profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=edit_profile&controller=account">Edit profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=change_password&controller=account">Change password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=logout&controller=account">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container">
            <h1 class="masthead-heading mb-0">Welcome Back</h1>
            <h2 class="masthead-subheading mb-0">Supervisor</h2>

        </div>
    </div>

</header>



<!-- Footer -->
<footer class="py-5 bg-black">
    <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; Không Cháy Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>