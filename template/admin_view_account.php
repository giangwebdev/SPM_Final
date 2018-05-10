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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">

    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
         .unlock,.edit,.lock,.delete {
            width: 20px;
            height: 20px;
        }
        .lock{
            object-fit: fill;
        }
        .unlock{
            object-fit: contain;
        }
        .lock_btn, .edit_btn, .delete-btn{
            width: 50px;
            height: 50px;
        }
    </style>
    <link rel="stylesheet" href="./css/spmfu.css">
    <script src="./js/spmfu.js"></script>
</head >
<!-- Navigation -->
<body>
    <div>
    <h1 class="text-center" style="color: white;text-shadow: 1px 1px 50px #000;margin-top: 50px;">VIEW ACCOUNT</h1>
        <table id="account-list" class="table table-striped table-bordered" cellspacing="0px" style="background: rgba(6, 0, 255, 0.54);color: white; text-align: center; width: 60rem; margin: 0px auto;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Status</th>
                <?php if($role == 4) { ?> <th>Action</th>     <?php }  ?>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($acc_list as $info){
                    $_role='';

                    if($info['role_id']==1){
                        $_role="Student";
                    }
                    if($info['role_id']==2){
                        $_role="Supervisor";
                    }
                    if($info['role_id']==3){
                        $_role="Academic Staff";
                    }
                    if($info['role_id']==4){
                        $_role="Administrator";
                    }
                    if($info['role_id']==5){
                        $_role="Supervisor Head";
                    }

                ?>
                <tr>
                    <td> <?php echo $info['acc_id']; ?></td>
                    <td><?php echo $info['username']; ?></td>
                    <td><?php echo $_role; ?></td>

                    <td><?php echo $info['isactive']?"Active":"Deactivated"; ?> </td>
                <?php if($role == 4) { ?>
                    <td>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn lock_btn">
                                <?php echo $info['isactive'] ? "<img class=\"lock\" src=\"./image/lock.png\">" : "<img class='unlock' src=\"./image/unlock.png\">"; ?>
                            </button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="login100-form-btn edit_btn" type="button" name="admin_edit_profile" value="admin_edit_profile"><img class="edit" src="./image/pencil.png" style="width: 20px;height: 20px;">
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="login100-form-btn delete-btn"><img class="delete" src="./image/delete.png" style="width: 20px;height: 20px;">
                            </button>
                        </div>
                    </td>
                    <?php
                }
                    ?>
                </tr>

            <?php
                }
            ?>
            </tbody>
        </table>
    <button class="login100-form-btn" type="button" onclick="window.location.href='./index.php?action=homepage&controller=account'" style="margin: 0 auto">Back</button>
    </div>
    <div id="dialog-confirm" title="Delete Account">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>This account will be permanently deleted and cannot be recovered. Are you sure?</p>
    </div>

    <div>
        <form id="acc_data_form" action="./index.php?action=admin_edit_profile&controller=staff" method="post">
            <input type="hidden" name="acc_id" id="acc_id_edit">
            <input type="hidden" name="acc_role" id="acc_role_edit">
        </form>
    </div>
    <script>
        $(window).on("load", function() {
            $("#dialog-confirm").hide();

            $(".delete-btn").on("click", function () {
                var $row= $(this).parent().parent().parent();
                var acc_id = $row.find("td:first-child").html();
                var role_name = $row.find("td").next().next().html();
                $( "#dialog-confirm" ).dialog({
                    draggable: false,
                    resizable: false,
                    height: "auto",
                    width: 400,
                    modal: true,
                    buttons: {
                        "Delete Account": function() {
                            $.ajax({
                                type: "POST",
                                url: "./ajax_Handler.php",
                                data: {
                                    _action : "delete_account",
                                    acc_id_del :acc_id,
                                    role_name : role_name
                                } ,
                                success: function(){
                                    $row.remove();
                                }
                            });
                            $(this).dialog( "close" );
                        },
                        Cancel: function() {
                            $(this).dialog( "close" );
                        }
                    }
                });
            });


                $(".lock_btn").on("click",function () {
                    var $row= $(this).parent().parent().parent();
                    var acc_id = $row.find("td:first-child").html();
                    var $this = $(this);
                    if($(this).find("img").attr("class") === "lock"){
                        $.ajax({
                            type: "POST",
                            url: "./ajax_Handler.php",
                            data: {
                                _action :"account_status",
                                acc_id : acc_id,
                                account_status : 0
                            } ,
                            success: function(){
                                $this.find("img").attr("src","./image/unlock.png");
                                $this.find("img").removeClass("lock").addClass("unlock");
                                $this.parent().parent().prev().html("Deactivated");
                            }
                        });


                    }else if($(this).find("img").attr("class") === "unlock"){
                        $.ajax({
                            type: "POST",
                            url: "./ajax_Handler.php",
                            data: {
                                _action: "account_status",
                                acc_id : acc_id,
                                account_status : 1
                            } ,
                            success: function(){
                                $this.find("img").attr("src","./image/lock.png");
                                $this.find("img").removeClass("unlock").addClass("lock");
                                $this.parent().parent().prev().html("Active");
                            }
                        });

                    }

                });

                $(".edit_btn").on("click",function () {
                    var $row= $(this).parent().parent().parent();
                    var acc_id = $row.find("td:first-child").html();
                    var role_name = $row.find("td").next().next().html();
                    var acc_role="";
                    if(role_name==="Student"){
                        acc_role=1;
                    }else if (role_name==="Supervisor"){
                        acc_role=2;
                    }else if (role_name==="Academic Staff"){
                        acc_role=3;
                    }else if (role_name==="Administrator"){
                        acc_role=4;
                    }else if (role_name==="Supervisor Head"){
                        acc_role=5;
                    }
                    $("#acc_id_edit").val(acc_id);
                    $("#acc_role_edit").val(acc_role);
                    $("#acc_data_form").submit();
                });

        })
    </script>
</body>

</html>
