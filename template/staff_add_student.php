<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/20/2018
 * Time: 1:57 PM
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
    <h1>Import student</h1>
<form action="./index.php?action=add_student_list&controller=staff" method="post">
    <p>Choose file to import (.xlsx)</p>
    <input type="file" name="filename" onchange="">
    <h1> Student List</h1>
    <table cellspacing="0" border="1">
        <tr>
            <td>Student ID</td>
            <td>Name</td>
            <td>DoB</td>
            <td>Gender</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Major</td>
        </tr>
        <tr>

        </tr>
    </table>
</form>
</body>
</html>
