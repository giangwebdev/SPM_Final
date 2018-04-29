<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
$account = new account();
$account->check_Session();
$role = $_SESSION['role_id'];
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

<body>
<div class="limiter">

    <div class="container-login100" style="background-image: url('./image/bg-01.jpg');">
        <div class="wrap-login100" style="color: white; min-width: 600px">


                <span class="login100-form-title p-b-34 p-t-27">
						ADD STUDENT
					</span>
    <h5>Import student</h5>
<form action="./index.php?action=add_student_list&controller=staff" method="post">
    <p>Choose file to import (.xlsx)</p>
    <input type="file" name="filename" onchange="">
    <h5> Student List</h5>
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
</form></div></div></div>
</body>
</html>
