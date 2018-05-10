<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/20/2018
 * Time: 2:00 PM
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->

    <link rel="icon" type="image/png" href="image/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--==================1=============================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom fonts for this . -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

    <link href="css/spmfu.css" rel="stylesheet">
    </button>

</head>
<?php if (isset($_SESSION['msg_noti'])) {
?>
<body onload="window.alert('<?php echo $_SESSION['msg_noti']; ?>')";
}">
    <?php
    unset($_SESSION['msg_noti']);
}?>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <a class="navbar-brand" href="#"><img src="image/Logo-FU-01.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>


    </div>
</nav>
<div class="limiter">

    <div class="container-login100">
        <div class="wrap-login100" style="color: white; width: auto">
            <h1><span class="login100-form-title p-b-34 p-t-27">
                    RESET PASSWORD
					</span></h1>

        <form action="./index.php?action=reset_password&controller=account" method="post">
            Type your username: <input style="border-radius: 10px; margin-top: 10px;" class="form-control" type="text" name="reset_username" required>
            <br>
            <br>
            <div class="container-login100-form-btn" style="margin-bottom: 20px; ">
            <button class="login100-form-btn" type="submit">Send</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="login100-form-btn" type="button" onclick="window.location='./login.php'">Back</button>
            </div>
        </form>
        </div></div></div>
<footer class="bg-black">
    <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>




<!--===============================================================================================-->

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
