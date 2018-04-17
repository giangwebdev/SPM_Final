<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/26/2018
 * Time: 3:37 PM
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
    <h1>Edit profile</h1>
    <form action="../controllers/edit_profile.php" method="post">
        Full name <input type="text" name="full_name" value="">
        Student ID:
        Date of birth <input type="text" name="full_name" value="">
        Gender <input type="text" name="full_name" value="">
        Phone <input type="text" name="full_name" value="">
        Email <input type="text" name="full_name" value="">
        Major <input type="text" name="full_name" value="">
        Is supervisor head :
        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>
