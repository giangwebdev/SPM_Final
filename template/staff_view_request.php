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
                <th>Request ID</th>
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
                $team = trim($student_model->get_team_name_by_team_id($data['team_id']));
                if($data['request_type'] == "BMR" && $data['approve_by_staff'] !=null ){
                    $status = "Accepted";
                }elseif($data['request_type'] == "BMR" && $data['reject_by_staff']!=null ){
                    $status = "Rejected";
                }elseif ($data['request_type'] == "BMR" && $data['reject_by_staff'] == null &&  $data['approve_by_staff'] == null ){
                    $status = "Pending";
                }
                if($data['request_type'] == "CPN" && $data['approve_by_staff'] !=null && $data['approve_by_supervisor'] !=null){
                    $status = "<span style='color:rgb(36, 232, 30)'>Accepted</span>";
                }elseif($data['request_type'] == "CPN" && ($data['reject_by_staff'] !=null || $data['reject_by_supervisor'] !=null)){
                    $status = "<span style='color:rgb(229, 16, 16)'>Rejected</span>";
                }else{
                    $status = "<span style='color:rgb(243,255,67)'>Pending</span>";
                }
                if( $data['request_type'] == "CPN"){
                    $request_type = "Change Project Name";
                }else{
                    $request_type = "Book Meeting Room";
                }
                $request_id = $data['request_id'];
            ?>
            <tr class="clickable staff_request_detail">
                <td class="request_id"><?php echo $request_id?></td>
                <td class="request_type"><?php echo $request_type;?></td>
                <td class="request_by"><?php echo $request_by;?></td>
                <td class="team"><?php echo $team;?></td>
                <td class="status"><?php echo $status;?></td>
                <?php $content = json_decode($data['content'],true);
                    foreach($content as $key => $value) {
                        if($key == "date") $value = date("d-m-Y", strtotime($value));
                        ?>

                        <input type="hidden" class="<?php echo $key;?>" value="<?php echo $value;?>">
                        <?php
                    }
                ?>
            </tr>
            <?php
            }
            ?>

        </table>
        <button class="login100-form-btn" id="back_btn" type="button" onclick="window.location.href='./index.php?action=homepage&controller=account'" style="margin: 0 auto;">Back</button>
    </form>

    <div >
        <form class="bmr-dialog" title="Book meeting request" action="./index.php?action=update_request&controller=staff" method="post">
            <table>
                <tr>
                    <td>Request ID</td>
                    <td id="request_id"></td>
                </tr>
                <tr>
                    <td>Request type</td>
                    <td id="request_type"></td>
                </tr>
                <tr>
                    <td>Team</td>
                    <td id="team"></td>
                </tr>
                <tr>
                    <td>Slot</td>
                    <td id="slot"></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td id="date"></td>
                </tr>
                <tr>
                    <td>Room</td>
                    <td><input type="text" id = "room" name="room_number" value=""></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td id="description"></td>
                </tr>
                <tr>
                    <td> Request by</td>
                    <td id="request_by"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td id="status"></td>
                </tr>
                <input type="hidden" name="Approve" value="BMR">
                <input type="hidden" id="hidden_request_id" name="request_id" value="">
                <input type="hidden" id="hidden_team" name="team" value="">
                <input type="hidden" id="hidden_slot" name="slot" value="">
                <input type="hidden" id="hidden_date" name="date" value="">
                <input type="hidden" id="hidden_description" name="description" value="">
            </table>
            <button value="1" type="submit" name="approve_action" class="approve-btn">Approve</button>
            <button value="0" type="submit" name="approve_action" class="approve-btn">Reject</button>
            <button type="button" name="Cancel" class="cancel-btn">Cancel</button>
        </form>
    </div>

    <div>
        <form class="cpn-dialog" title="Change Project Name Request" action="./index.php?action=update_request&controller=staff" method="post">
            <table>
                <tr>
                    <td>Request ID</td>
                    <td id="request_id"></td>
                </tr>
                <tr>
                    <td>Request type</td>
                    <td id="request_type"></td>
                </tr>
                <tr>
                    <td>Team</td>
                    <td id="team"></td>
                </tr>
                <tr>
                    <td>Old name (EN)</td>
                    <td id="old_name_en"></td>
                </tr>
                <tr>
                    <td>Old name (VI)</td>
                    <td id="old_name_vi"></td>
                </tr>
                <tr>
                    <td>Old project code</td>
                    <td id="old_code"></td>
                </tr>
                <tr>
                    <td>New name (EN)</td>
                    <td id="new_name_en"></td>
                </tr>
                <tr>
                    <td>New name (VI)</td>
                    <td id="new_name_vi"></td>
                </tr>
                <tr>
                    <td>New project code</td>
                    <td id="new_code"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td id="description"></td>
                </tr>
                <tr>
                    <td>Request by</td>
                    <td id="request_by"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td id="status"></td>
                </tr>
                <input type="hidden" name="Approve" value="CPN">
                <input type="hidden" id="hidden_request_id" name="request_id" value="">
                <input type="hidden" id="hidden_request_type" name="request_type" value="">
                <input type="hidden" id="hidden_team" name="team" value="">
                <input type="hidden" id="hidden_old_name_en" name="old_name_en" value="">
                <input type="hidden" id="hidden_old_name_vi" name="old_name_vi" value="">
                <input type="hidden" id="hidden_old_code" name="old_code" value="">
                <input type="hidden" id="hidden_new_name_vi" name="new_name_vi" value="">
                <input type="hidden" id="hidden_new_name_en" name="new_name_en" value="">
                <input type="hidden" id="hidden_new_code" name="new_code" value="">
                <input type="hidden" id="hidden_description" name="description" value="">
            </table>
            <button value="1" type="submit" name="approve_action" class="approve-btn">Approve</button>
            <button value="0" type="submit" name="approve_action" class="approve-btn">Reject</button>
            <button type="button" name="Cancel" class="cancel-btn">Cancel</button>
        </form>

    </div>
    <script>
        $( function() {
                $(".approve-btn").button();
            $( ".cpn-dialog" ).dialog({
                autoOpen:false,
                draggable: false,
                resizable: false,
                height: "auto",
                width: 400,
                modal: true
            });

            $( ".bmr-dialog" ).dialog({
                autoOpen:false,
                draggable: false,
                resizable: false,
                height: "auto",
                width: 400,
                modal: true
            });

            $(".staff_request_detail").on("click",function () {
                var $this = $(this);
                var $bmr = $(".bmr-dialog");
                var $cpn = $(".cpn-dialog");
                if($this.find(".request_type").html() === "Book Meeting Room"){
                   $bmr.find("#request_id").html($this.find(".request_id").html());
                   $bmr.find("#request_type").html($this.find(".request_type").html());
                   $bmr.find("#team").html($this.find(".team").html());
                   $bmr.find("#slot").html($this.find(".slot").val());
                   $bmr.find("#date").html($this.find(".date").val());
                   $bmr.find("#description").html($this.find(".description").val());
                   $bmr.find("#request_by").html($this.find(".request_by").html());
                   $bmr.find("#status").html($this.find(".status").html());
                   // --hidden values
                    $bmr.find("#hidden_request_id").val($this.find(".request_id").html());
                    $bmr.find("#hidden_team").val($this.find(".request_type").html());
                    $bmr.find("#hidden_slot").val($this.find(".team").html());
                    $bmr.find("#hidden_date").val($this.find(".old_name_en").val());
                    $bmr.find("#hidden_description").val($this.find(".old_name_vi").val());

                   $bmr.dialog("open");
                }else if($this.find(".request_type").html() === "Change Project Name"){
                    $cpn.find("#request_id").html($this.find(".request_id").html());
                    $cpn.find("#request_type").html($this.find(".request_type").html());
                    $cpn.find("#team").html($this.find(".team").html());
                    $cpn.find("#old_name_en").html($this.find(".old_name_en").val());
                    $cpn.find("#old_name_vi").html($this.find(".old_name_vi").val());
                    $cpn.find("#old_code").html($this.find(".old_code").val());
                    $cpn.find("#new_name_en").html($this.find(".name_en").val());
                    $cpn.find("#new_name_vi").html($this.find(".name_vi").val());
                    $cpn.find("#new_code").html($this.find(".new_code").val());
                    $cpn.find("#description").html($this.find(".description").val());
                    $cpn.find("#request_by").html($this.find(".request_by").html());
                    $cpn.find("#status").html($this.find(".status").html());
                    // --hidden values
                    $cpn.find("#hidden_request_id").val($this.find(".request_id").html());
                    $cpn.find("#hidden_request_type").val($this.find(".request_type").html());
                    $cpn.find("#hidden_team" ).val($this.find(".team").html());
                    $cpn.find("#hidden_old_name_en").val($this.find(".old_name_en").val());
                    $cpn.find("#hidden_old_name_vi").val($this.find(".old_name_vi").val());
                    $cpn.find("#hidden_old_code").val($this.find(".old_code").val());
                    $cpn.find("#hidden_new_name_vi").val($this.find(".name_en").val());
                    $cpn.find("#hidden_new_name_en").val($this.find(".name_vi").val());
                    $cpn.find("#hidden_new_code" ).val($this.find(".new_code").val());
                    $cpn.find("#hidden_description").val($this.find(".description").val());
                    $cpn.dialog("open");
                }
            });

            $(".cancel-btn").button().on("click",function () {
                $( ".bmr-dialog" ).dialog("close");
                $( ".cpn-dialog" ).dialog("close");
            })


        } );
    </script>

</div>
</body>
</html>
