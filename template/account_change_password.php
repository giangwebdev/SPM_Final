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
</head>
<?php require_once(SITE_ROOT."/template/header.php"); ?>
<body>
<div class="limiter">

    <div class="container-login100" style="background-image: url('./image/bg-01.jpg');">
        <div class="wrap-login100" style="color: white; width: auto">


                <span class="login100-form-title p-b-34 p-t-27">
						CHANGE PASSWORD
					</span>
<form action="./index.php?action=change_password&controller=account" method="post">
    <table>
        <tr>
            <td>Current password: </td><br>
            <td><div class="wrap-input100"><input class="input100" type="password" name="current_password"></div></td>
        </tr>
        <tr>
            <td>New password:</td>
            <td><div class="wrap-input100"> <input class="input100" type="password" name="new_password"></div></td>
        </tr>
        <tr>
            <td>Confirm new password:</td>
            <td><div class="wrap-input100"><input class="input100" type="password" name="new_password_re"></div></td>
        </tr>

    </table><br>
    <td><div class="container-login100-form-btn" >
    <button class="login100-form-btn" type="submit" name="change_pass_btn">Change</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <button class="login100-form-btn" type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'">Back</button>
        </div>
    </td>
</form></div></div></div>
</body>
</html>