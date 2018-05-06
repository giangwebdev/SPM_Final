<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
$account = new account();
$account->check_Session();
$role = $_SESSION['role_id'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
    <?php require_once(SITE_ROOT."/template/header.php"); ?>
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/spmfu.css"/>
        <script src="./js/spmfu.js"></script>
</head>



<body >
<div class="limiter">

    <div class="container-login100">
        <div class="wrap-login100" style="width: 400px">


                <span class="login100-form-title p-b-34 p-t-27">
						CREATE ACCOUNT
					</span>


        <form action="./index.php?action=create_account&controller=staff" method="post">
            <br>
                <br><tr>
                    <h5 style="color: white; ">Email: </h5>
                <td><div class="wrap-input100 validate-input" data-validate = "Enter Email">
                        <input class="input100" type="text" name="email" placeholder="Email"></div></td>
                </tr><br>
                <br><tr>
                <h5 style="color: white; ">Role: </h5>

                    <td><select class="role input100" name="role" >
                            <option  selected >- Choose role -</option>
                            <option  value="1">Student</option>
                            <option  value="2">Supervisor</option>
                            <option  value="3">Academic Staff</option>
                            <option  value="4">Administrator</option>
                            <option  value="5">Supervisor Head</option>
                        </select>
                    </td>
                </tr><br>
                <tr>
                    <td></td>
                    <td>
                        <div class="container-login100-form-btn" >
                            <button class="login100-form-btn create-btn" type="submit" name="sumit_btn" style="color: red;">
                                Create
                            </button>
                            <button class="login100-form-btn" type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'" >Cancel</button>
                        </div>

                    </td>
                </tr>


<!--            </form>-->
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

