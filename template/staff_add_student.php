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
    <?php require_once(SITE_ROOT."/template/header.php"); ?>
<!--    <link rel="stylesheet" href="../css/spmfu.css">-->
    <STYLE>
        .table-header{
           width: 100px;
            text-align: center;
        }
        #back_btn{

        }
    </STYLE>
</head>


<body>
<div class="limiter">

    <div class="container-login100" style="background-image: url('/image/bg-01.jpg');">
        <div class="wrap-login100" style="color: white; min-width: 600px">


                <span class="login100-form-title p-b-34 p-t-27">
						ADD STUDENT
					</span>
    <h5>Import student</h5>
<form action="./index.php?action=add_student_list&controller=staff" method="post">
    <p>Choose file to import (.xlsx)</p>
    <input type="file" name="filename" onchange="">
    <br>
    <br>
    <h5> Student List</h5>
    <table cellspacing="0" border="1">
        <tr>
            <th class="table-header">Student ID</th>
            <th class="table-header">Name</th>
            <th class="table-header">DoB</th>
            <th class="table-header">Gender</th>
            <th class="table-header">Phone</th>
            <th class="table-header">Email</th>
            <th class="table-header">Major</th>
        </tr>
        <tr>

        </tr>
    </table>
    <button class="login100-form-btn" id="back_btn" type="button" onclick="window.location.href='./index.php?action=homepage&controller=account'">Back</button>
</form>
        </div>
    </div>
</div>
</body>
</html>
