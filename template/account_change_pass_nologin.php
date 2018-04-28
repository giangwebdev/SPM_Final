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
</head>

<?php require_once(SITE_ROOT."/template/header.php"); ?>
<body>
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
            <td><input type="text" name="acc_name"><br></td>
        </tr>
        <tr>
            <td>Temporary password:</td>
            <td> <input type="password" name="password_temp" id="password_temp">
                <button type="button" id="temp_pwd_btn" onclick="see_pass('password_temp','temp_pwd_btn');" >Show</button><br></td>
        </tr>
        <tr>
            <td>New password:</td>
            <td> <input type="password" name="password_new" id="password_new">
                <button type="button" id="new_pwd_btn" onclick="see_pass('password_new','new_pwd_btn');" >Show</button><br></td>
        </tr>
        <tr>
            <td>Confirm password:</td>
            <td> <input type="password" name="re_password_new" id="re_password_new">
                <button type="button" id="re_pwd_btn" onclick="see_pass('re_password_new','re_pwd_btn');" >Show</button><br></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="change_password_btn">Change password</button>
                <button type="button" name="back_to_login_page" onclick="window.location.href='../index.php?action=login&controller=account'">Back</button></td>
        </tr>
    </table>
</form>
        </div></div></div>
</body>
</html>
