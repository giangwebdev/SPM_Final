<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
$account = new account();
$account->check_Session();
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
>
</head>
<!-- Navigation -->
<body style="margin: 150px 0">

<?php require_once(SITE_ROOT."/template/header.php"); ?>

<div class="container-login100" style="background-image: url('./image/bg-01.jpg');">>
    <span class="login100-form-title p-b-34 p-t-27">VIEW ACCOUNT
    </span>
        <table id="account-list" class="table table-striped table-bordered" cellspacing="10px">
            <thead>
            <tr>
                <th>ID&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Username&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Role&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Status&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
<<<<<<< HEAD
                    <td><button style="float: left;" ><?php echo $info['isactive']?"Lock":"Unlock"; ?></button>
                    <button style="margin: 0px auto;" type="button" name="admin_edit_profile"  onclick="window.location.href='./index.php?action=admin_edit_profile&controller=staff'">Edit</button>
                    <button style="float: right;">Delete</button></td>
=======
                    <td><div class="container-login100-form-btn"><button class="login100-form-btn" ><?php echo $info['isactive']?"Lock":"Unlock"; ?></button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="login100-form-btn" type="button" name="admin_edit_profile" onclick="window.location.href='./index.php?action=admin_edit_profile&controller=staff'"><span class="glyphicon glyphicon-pencil"></span>Edit</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="login100-form-btn">Delete</button></div></td>
>>>>>>> 5e1e021d96bb1090bc7ef1072274175a64242af2
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    <button type="button" onclick="window.location.href='./index.php?action=homepage&controller=account'">Back</button>
</div>
    </div></div>
</body>

</html>
<!--<style>-->
<!--    /*-->
<!--/* Created by Filipe Pina-->
<!-- * Specific styles of signin, register, component-->
<!-- */-->
<!--    /*-->
<!--     * General styles-->
<!--     */-->
<!--    #playground-container {-->
<!--        height: 500px;-->
<!--        overflow: hidden !important;-->
<!--        -webkit-overflow-scrolling: touch;-->
<!--    }-->
<!--    body, html{-->
<!--        /*height: 100%;*/-->
<!--        background-repeat: no-repeat;-->
<!--        background:url(https://i.ytimg.com/vi/4kfXjatgeEU/maxresdefault.jpg);-->
<!--        font-family: 'Oxygen', sans-serif;-->
<!--        background-size: cover;-->
<!--    }-->
<!---->
<!--    .main{-->
<!--        margin:50px 15px;-->
<!--    }-->
<!---->
<!--    h1.title {-->
<!--        font-size: 50px;-->
<!--        font-family: 'Passion One', cursive;-->
<!--        font-weight: 400;-->
<!--    }-->
<!---->
<!--    hr{-->
<!--        width: 10%;-->
<!--        color: #fff;-->
<!--    }-->
<!---->
<!--    .form-group{-->
<!--        margin-bottom: 15px;-->
<!--    }-->
<!---->
<!--    label{-->
<!--        margin-bottom: 15px;-->
<!--    }-->
<!---->
<!--    input,-->
<!--    input::-webkit-input-placeholder {-->
<!--        font-size: 11px;-->
<!--        padding-top: 3px;-->
<!--    }-->
<!---->
<!--    .main-login{-->
<!--        background-color: #fff;-->
<!--        /* shadows and rounded borders */-->
<!--        -moz-border-radius: 2px;-->
<!--        -webkit-border-radius: 2px;-->
<!--        border-radius: 2px;-->
<!--        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-->
<!--        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-->
<!--        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-->
<!---->
<!--    }-->
<!--    .form-control {-->
<!--        height: auto!important;-->
<!--        padding: 8px 12px !important;-->
<!--    }-->
<!--    .input-group {-->
<!--        -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;-->
<!--        -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;-->
<!--        box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;-->
<!--    }-->
<!--    #button {-->
<!--        border: 1px solid #ccc;-->
<!--        margin-top: 28px;-->
<!--        padding: 6px 12px;-->
<!--        color: #666;-->
<!--        text-shadow: 0 1px #fff;-->
<!--        cursor: pointer;-->
<!--        -moz-border-radius: 3px 3px;-->
<!--        -webkit-border-radius: 3px 3px;-->
<!--        border-radius: 3px 3px;-->
<!--        -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;-->
<!--        -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;-->
<!--        box-shadow: 0 1px #fff inset, 0 1px #ddd;-->
<!--        background: #f5f5f5;-->
<!--        background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);-->
<!--        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));-->
<!--        background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);-->
<!--        background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);-->
<!--        background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);-->
<!--        background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);-->
<!--        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);-->
<!--    }-->
<!--    .main-center{-->
<!--        margin-top: 30px;-->
<!--        margin: 0 auto;-->
<!--        max-width: 900px;-->
<!--        padding: 10px 40px;-->
<!--        background:#009edf;-->
<!--        color: #FFF;-->
<!--        text-shadow: none;-->
<!--        -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);-->
<!--        -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);-->
<!--        box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);-->
<!---->
<!--    }-->
<!--    span.input-group-addon i {-->
<!--        color: #009edf;-->
<!--        font-size: 17px;-->
<!--    }-->
<!---->
<!--    .login-button{-->
<!--        margin-top: 5px;-->
<!--    }-->
<!---->
<!--    .login-register{-->
<!--        font-size: 11px;-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--    input, textarea {-->
<!--        max-width: 100%;-->
<!--    }-->
<!---->
<!--</style>-->