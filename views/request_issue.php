<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/26/2018
 * Time: 6:00 PM
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
    <h1>Request Issue</h1>
    <form action="../controllers/request_issue.php" method="post">
        Type of Issue:
        <select name="issue_type" id="issue_type">
            <option value="meeting">Meeting schedule</option>
            <option value="change_member">Changing member</option>
            <option value="change_cpro_name">Changing Capstone Project's name</option>
        </select><br>
        Content: <br><textarea name="content" rows="10" cols="50" required></textarea>
        <br><br>
            <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
