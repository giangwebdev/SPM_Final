<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/student_model.php");
require_once (SITE_ROOT."/views/student_view.php");
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
    <title>Document</title>
    <link rel="stylesheet" href="../css/spmfu.css">
</head>
<?php require_once(SITE_ROOT."/template/header.php"); ?>

<body >
<div class="limiter">

    <div class="container-login100" style="background-image: url('./image/bg-01.jpg');">

        <div class="wrap-login100">
    <h1 class="text-center">MANAGE NEW TEAM CREATING REQUEST
    </h1>
        <form>
            <table cellspacing="0" border="1" style="margin: 0 auto">
                <tr>
                    <th>Team name</th>
                    <th>Project name</th>
                    <th>Supervisor</th>
                    <th>Number of member</th>
                </tr>
            </table>

                <tr>

                    <td>
                        <div class="container-login100-form-btn" >
                        <button class="login100-form-btn">Accept</button>
                        <button class="login100-form-btn">Reject</button>
                    </td>
                </tr>


        </form></div></div></div>
</body>
</html>
