<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/26/2018
 * Time: 3:36 PM
 */
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
    <header>Header</header>
    <menu></menu>
    <h1>Change password</h1>
    <form action="../controllers/change_password.php" action="post">
        Your current password: <input type="password" name="current_password" value="" required><br>
        Your new password: <input type="password" name="new_password" value="" required> <br>
        Retype your new password: <input type="password" name="retype_password" value="" required><br><br>
        <input type="submit" name="change_btn" value="Change">
    </form>

</body>
</html>