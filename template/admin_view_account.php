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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
    <?php require_once(SITE_ROOT."/template/header.php"); ?>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('#account-list').DataTable();
        } );
    </script>
    <style>
        #account-list_length{
            padding-top: 60px;
            color: white;
            text-shadow: 1px 1px 50px #000;
            text-align: center;
        }
        #account-list_filter{
            padding-top: 60px;
            color: white;
            text-shadow: 1px 1px 50px #000;
            text-align: center;

        }
        #account-list_info{
            color: white;
            text-shadow: 1px 1px 50px #000;
            text-align: center;
        }
        /*#header{*/
            /*position: static;*/
        /*}*/
    </style>
</head>
<!-- Navigation -->
<body style="background-image: url('./image/bg-01.jpg');">

<div class="container-login100" >
    <span class="login100-form-title p-b-34 p-t-27">
    </span>
    <h1 class="text-center" style="color: white;text-shadow: 1px 1px 50px #000;margin-top: 100px;">VIEW ACCOUNT</h1>
        <table id="account-list" class="table table-striped table-bordered" cellspacing="0px" style="background: rgba(6, 0, 255, 0.54);color: white; text-align: center; width: 60rem; margin: 0px auto;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Status</th>
                <th> Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($acc_list as $info){
                    $role='';

                    if($info['role_id']==1){
                        $role="Student";
                    }
                    if($info['role_id']==2){
                        $role="Supervisor";
                    }
                    if($info['role_id']==3){
                        $role="Academic Staff";
                    }
                    if($info['role_id']==4){
                        $role="Administrator";
                    }
                    if($info['role_id']==5){
                        $role="Supervisor Head";
                    }

                ?>
                <tr>
                    <td> <?php echo $info['acc_id']; ?></td>
                    <td><?php echo $info['username']; ?></td>
                    <td><?php echo $role; ?></td>

                    <td><?php echo $info['isactive']?"Active":"Inactive"; ?> </td>

                    <td><div class="container-login100-form-btn"><button class="login100-form-btn" style="width: 50px;" ><?php echo $info['isactive']?"<img src=\"./image/lock.png\" style=\"width: 20px; height: 20px\">":"<img src=\"./image/unlock.png\" style=\"width: 20px; height: 20px\">"; ?></button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="login100-form-btn" type="button" name="admin_edit_profile" onclick="window.location.href='./index.php?action=admin_edit_profile&controller=staff'" style="width: 50px"><img src="./image/pencil.png" style="width: 20px;height: 20px;"></button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="login100-form-btn" style="width: 50px;"><img src="./image/delete.png" style="width: 20px;height: 20px;"></button></div></td>

                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    <button class="login100-form-btn" type="button" onclick="window.location.href='./index.php?action=homepage&controller=account'" style="margin: 0 auto">Back</button>
</div>
    </div></div>
</body>

</html>
