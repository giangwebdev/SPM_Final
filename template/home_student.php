<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/6/2018
 * Time: 10:41 AM
 */
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
$account = new account();
$account->check_Session();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Home Page</title>
    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">

</head>
<?php require_once(SITE_ROOT."/template/header.php"); ?>
<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container">
            <h1 class="masthead-heading mb-0">Welcome Back</h1>
            <h2 class="masthead-subheading mb-0">Staff</h2>

        </div>
    </div>

</header>

<footer class="py-5 bg-black">
    <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; Không Cháy Website 2018</p>
    </div>
    <!-- /.container -->
</footer>
</html>
