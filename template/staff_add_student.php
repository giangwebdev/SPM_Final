<?php
require_once __DIR__."/../config.php";
//require_once (SITE_ROOT."/controllers/account_controller.php");
//$account = new account();
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
    <link rel="stylesheet" href="../css/spmfu.css">
</head>
<?php require_once(SITE_ROOT."/template/header.php"); ?>

<body style="margin: 150px 0">
<div class="main-login main-center">
    <h2 class="text-center">ADD STUDENT
    </h2>
    <h1>Import student</h1>
<form>
    <input type="file" name="filename">
    <h1> Student List</h1>
    <table cellspacing="0" border="1">
        <tr>
            <td>Student ID</td>
            <td>Name</td>
            <td>Gender</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Major</td>
        </tr>
        <tr>
            //Data of imported students shows here!!
        </tr>
    </table>
</form></div>
</body>
</html>
