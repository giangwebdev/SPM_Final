<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/26/2018
 * Time: 3:34 PM
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
        <h1>Create account</h1>
        <form action="../controllers/create_account.php" method="post">
            Email:<input type="text" name="email" required><br>
            Password: <input type="password" name="password"><br>
            <br>
            <input type="submit" name="Create" value="Create">

        </form>
</body>
</html>
