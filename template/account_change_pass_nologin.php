<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
$account = new account();
//$account->check_Session();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/spmfu.css">
    <script src="../js/spmfu.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="../css/one-page-wonder.min.css" rel="stylesheet">
    <style>
        #re_pwd_btn,#new_pwd_btn,#temp_pwd_btn{
            color: #DDDDDD;
            float: right;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <a class="navbar-brand" href="#"><img src="../image/Logo-FU-01.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </div>
</nav>

<div class="limiter">

    <div class="container-login100" style="background-image: url('./image/bg-01.jpg');">
        <div class="wrap-login100" style="color: white; width: auto">


                <span class="login100-form-title p-b-34 p-t-27">
						CHANGE PASSWORD
					</span>

    <script>
        function see_pass(target,button) {
            var x = document.getElementById(target);
            var y = document.getElementById(button);
            if (x.type === "password") {
                x.type = "text";
                y.innerHTML = "Hide";
            } else {
                x.type = "password";
                y.innerHTML = "Show";
            }
        }
    </script>

<form action="../index.php?action=change_pass_nologin&controller=account" method="post">
    <table>
        <tr>
            <td>Account:</td>
            <td><input type="text" name="acc_name" class="form-control"><br></td>
        </tr>
        <tr>
            <td>Temporary password:</td>
            <td> <input type="password" name="password_temp" id="password_temp" class="form-control">
                <button type="button" id="temp_pwd_btn" onclick="see_pass('password_temp','temp_pwd_btn');" >Show</button><br></td>
        </tr>
        <tr>
            <td>New password:</td>
            <td> <input type="password" name="password_new" id="password_new" class="form-control">
                <button type="button" id="new_pwd_btn" onclick="see_pass('password_new','new_pwd_btn');" >Show</button><br></td>
        </tr>
        <tr>
            <td>Confirm password:</td>
            <td> <input type="password" name="re_password_new" id="re_password_new" class="form-control">
                <button type="button" id="re_pwd_btn" onclick="see_pass('re_password_new','re_pwd_btn');" >Show</button><br></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="change_password_btn" class="button">Change password</button>
                <button type="button" name="back_to_login_page"  class="button" onclick="window.location.href='../index.php?action=login&controller=account'">Back</button></td>
        </tr>
    </table>
</form>
        </div>
    </div>
</div>
<footer class="bg-black">
    <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; Không Cháy Website 2018</p>
    </div>
    <!-- /.container -->
</footer>
</body>
</html>
