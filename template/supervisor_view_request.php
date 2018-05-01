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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="./css/spmfu.css">
    <script src="./js/spmfu.js"></script>
<!--    <style>-->
<!--        #header{-->
<!--            position: static;-->
<!--        }-->
<!--    </style>-->
</head>
<body style="background-image: url('./image/bg-01.jpg');background-repeat: no-repeat;background-size: 100% 100%;">
        <h1 class="text-center" style="color: white;text-shadow: 1px 1px 50px #000;margin-top: 50px;">VIEW REQUEST</h1>
        <table id="supervisor_view_request" class="table table-striped table-bordered" style="background: rgba(6, 0, 255, 0.54);max-width: 1000px;margin: 0 auto;box-shadow: 1px 1px 50px #000;text-align: center;color: white;">
            <thead>
            <tr>
                <th>Request type</th>
                <th>Description</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Change Project Name</td>
                <td>123456</td>
                <td>23/01/2018</td>
                <td>Done</td>
            </tr>
            </tbody>
        </table>
</body>
</html>
