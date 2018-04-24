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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="./css/spmfu.css">-->
    <link href="/css/one-page-wonder.min.css" rel="stylesheet">
</head>
<body>
        <h1>Reset password</h1>
        <form action="./index.php?action=reset_password&controller=account" method="post">
            Type your username: <input type="text" name="reset_username" >
            <br>
            <button type="submit">Send</button>
        </form>
</body>
</html>
