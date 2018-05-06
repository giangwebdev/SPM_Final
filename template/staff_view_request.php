<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/20/2018
 * Time: 1:57 PM
 */
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
require_once (SITE_ROOT."/models/student_model.php");
require_once (SITE_ROOT . "/models/account_model.php");

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
    <script src="./js/spmfu.js"></script>
    <link rel="stylesheet" href="./css/main.css">
</head>


<body>
<div class="main-login main-center">
    <h2 class="text-center">MANAGE REQUEST
    </h2>
    <form>
        <div>Request type:<br>
            <select>
                <option selected>All requests</option>
                <option>Meeting request</option>
                <option>Change project name</option>
            </select></div>
        <br>
        <table id="view_request_staff" class="table table-striped table-bordered" >
            <tr>
                <th>Request type</th>
                <th>Request by</th>
                <th>Team</th>
                <th>Status</th>
            </tr>
            <?php
            foreach ($request_data as $data){
                $account_model = new account_model();
                $student_model = new student_model();
                $request_by =  $account_model->get_name_by_id($data['request_by']);
                $team = $student_model->get_team_name_by_team_id($data['team_id']);
                if($data['request_type'] == "BMR" && $data['approve_by_staff'] == "1" ){
                    $status = "Accepted";
                }elseif($data['request_type'] == "BMR" && $data['reject_by_staff'] == "1" ){
                    $status = "Rejected";
                }elseif ($data['request_type'] == "BMR" && $data['reject_by_staff'] == "0" &&  $data['approve_by_staff'] == "0" ){
                    $status = "Pending";
                }
                if($data['request_type'] == "CPN" && $data['approve_by_staff'] == "1" && $data['approve_by_supervisor'] == "1"){
                    $status = "Accepted";
                }elseif($data['request_type'] == "CPN" && ($data['reject_by_staff'] == "1" || $data['reject_by_supervisor'] == "1")){
                    $status = "Rejected";
                }else{
                    $status = "Pending";
                }
                if( $data['request_type'] == "CPN"){
                    $request_type = "Change Project Name";
                }else{
                    $request_type = "Book Meeting Room";
                }

            ?>
            <tr>
                <td><?php echo $request_type;?></td>
                <td><?php echo $request_by;?></td>
                <td><?php echo $team;?></td>
                <td><?php echo $status;?></td>
            </tr>
            <?php
            }
            ?>

        </table>
        <button class="login100-form-btn" id="back_btn" type="button" onclick="window.location.href='./index.php?action=homepage&controller=account'" style="margin: 0 auto;">Back</button>
    </form>

    <div class="bmr-dialog-confirm">
        <table>
            <tr>
                <td>Request type</td>
                <td>Book Meeting Room</td>
            </tr>
            <tr>
                <td>Team</td>
                <td>Team 1</td>
            </tr>
            <tr>
                <td>Room</td>
                <td><input type="text" name="room_id" value=""></td>
            </tr>
            <tr>
                <td>Time</td>
                <td>27/05/2018</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>Nothing</td>
            </tr>
            <tr>
                <td> Request by</td>
                <td>Mr A</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>In process</td>
            </tr>
        </table>

    </div>

    <div class="cpn-dialog-confirm " TITLE="Request">
        <table>
            <tr>
                <td>Request type</td>
                <td>Change Project Name</td>
            </tr>
            <tr>
                <td>Team</td>
                <td>Team 2</td>
            </tr>
            <tr>
                <td>Old name</td>
                <td>Book tours all over the world</td>
            </tr>
            <tr>
                <td>New name (EN)</td>
                <td>Pretty House</td>
            </tr>
            <tr>
                <td>New name (VI)</td>
                <td>Làm đẹp nhà bạn</td>
            </tr>
            <tr>
                <td> Request by</td>
                <td>Hoang Thanh Hai</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>Accepted</td>
            </tr>
        </table>

    </div>
    <script>
        $( function() {
            $( ".cpn-dialog-confirm" ).dialog({
                autoOpen:false,
                draggable: false,
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                    "Approve": function() {
                        $( this ).dialog( "close" );
                    },
                    Cancel: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });

                    } );

        $( function() {
            $( ".bmr-dialog-confirm" ).dialog({
                autoOpen:false,
                draggable: false,
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                    "Approve": function() {
                        $( this ).dialog( "close" );
                    },
                    Cancel: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });

        } );
    </script>

</div>
</body>
</html>
