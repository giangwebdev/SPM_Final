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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="./index.php?action=change_password&controller=account" method="post">
    <table>
        <tr>
            <td>Current password: </td>
            <td><input type="password" name="current_password"></td>
        </tr>
        <tr>
            <td>New password:</td>
            <td> <input type="password" name="new_password"></td>
        </tr>
        <tr>
            <td>Confirm new password:</td>
            <td><input type="password" name="new_password_re"></td>
        </tr>

    </table>
    <button type="submit" name="change_pass_btn">Change</button>
    <button type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'">Back</button>
</form>
</body>
</html>