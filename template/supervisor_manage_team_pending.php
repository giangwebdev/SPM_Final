<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/student_model.php");
require_once (SITE_ROOT."/views/student_view.php");
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
    <?php require_once(SITE_ROOT."/template/header.php"); ?>
</head>


<body >
<div class="limiter">

    <div class="container-login100">

        <div class="wrap-login100">
    <h1 class="text-center">MANAGE TEAM PENDING    </h1>
        <form>
            <table id="team_pending_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Team name</th>
                    <th>Project name</th>
                    <th>Supervisor</th>
                    <th>Number of member</th>
                </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Flower Shop</td>
                        <td>Flower Shop</td>
                        <td>Mr A</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>Beauty and Dating</td>
                        <td>Beauty and Dating</td>
                        <td>Mr B</td>
                        <td>5</td>
                    </tr>
                </tbody>
            </table>
            <br>
                <tr>
                    <td>
                        <div class="container-login100-form-btn" >
                        <button class="login100-form-btn">Accept</button>
                        <button class="login100-form-btn">Reject</button>
                    </td>
                </tr>


        </form>
        </div>
    </div>
</div>
</body>
</html>
