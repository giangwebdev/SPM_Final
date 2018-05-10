<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/25/2018
 * Time: 9:03 AM
 */
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/student_model.php");
require_once (SITE_ROOT."/views/student_view.php");
require_once (SITE_ROOT."/controllers/account_controller.php");
require_once(SITE_ROOT . "/models/account_model.php");
require_once(SITE_ROOT . "/models/supervisor_model.php");
$account = new account();
$account->check_Session();
$account_model = new account_model();
$student_model = new student_model();
$supervisor_model = new supervisor_model();
$role = $_SESSION['role_id'];

?>

<!doctype html>
<!--suppress CssUnknownTarget -->
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
<style>
    #create_main_task,#myProgress{
        display: inline-block;
    }
    span{
        color: black;
    }
    #myProgress {
        width: 64.4%;
        background-color: #1b21dd;
    }

    #myBar {
        width: 1%;
        height: 8px;
        background-color: #dc1c29;
    }
    #create_bar{
        z-index: 99999;
        margin-bottom: -4em;
        margin-left: 15em;
    }
</style>
<script>
    $(function () {

        $("#task_table").find("tr").each(function () {
            var $tr = $(this);
            var $solved = $tr.find("td").filter(function () {
                return $(this).html()== "Solved";
            });
            var percent_done =  $solved.length / $tr.length *100;
            var elem = document.getElementById("myBar");
            var width = 1;
            var id = setInterval(frame, 10);
            function frame() {
                if (width >= (100-percent_done)) {
                    clearInterval(id);
                } else {
                    width++;
                    elem.style.width = width + '%';
                }
            }


        });

    });
</script>

<body>
<div><h1 class="text-center" style="color: white;text-shadow: 1px 1px 50px #000;margin-top: 10px;">VIEW TASK</h1>
</div>
<div id="create_bar">
    <button type="button" class="clickable" id="create_main_task" name="create_main_task">Create new task</button>
    <span>Progress bar:</span>
    <div id="myProgress">
        <div id="myBar"></div>
    </div>
</div>
<div class="container-login100"style="margin-top: 60px;" >
    <table id="task_table" class="table table-striped table-bordered" style="background: rgba(6, 0, 255, 0.54);color: white;">
        <thead>
        <tr>
            <th> </th>
            <th>Task ID</th>
            <th>Priority</th>
            <th>Task name</th>
            <th>Assign by</th>
            <th>Assign to</th>
            <th>Start date</th>
            <th>Deadline</th>
            <th>Finish date</th>
            <th>Technique check</th>
            <th>QA check</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody >
        <?php 
        foreach ($task_data as $data){

        ?>
        <tr>
            <td class="first-col"><img class="pointer_btn" src="./image/icons/plus_icon.png" width="20px"> </td>
            <td class="task_id" ><?php echo $data['task_id']; ?></td>
            <td class="priority"><?php echo $data['priority']; ?></td>
            <td class="task_name"><?php echo $data['task_name']; ?></td>
            <td class="assign_by"><?php echo $account_model->get_name_by_id($data['assign_by']); ?></td>
            <td class="assign_to"><?php echo $account_model->get_name_by_id($data['assign_to']); ?></td>
            <td class="start_date"><?php echo $data['start_date']; ?></td>
            <td class="deadline"><?php echo $data['deadline']; ?></td>
            <td class="finish_date"><?php echo $data['finish_date']; ?></td>
            <td class="technique_check_date"><?php if( $data['technique_check_date'] != "0000-00-00"){ echo $data['technique_check_date'];}else{echo null;} ?></td>
            <td class="qa_check_date"><?php if( $data['qa_check_date'] != "0000-00-00"){ echo $data['qa_check_date'];}else{echo null;} ?></td>
            <input type="hidden" value="<?php echo $data['parent_task_id']; ?>" class="parent_task_id">
            <input type="hidden" value="<?php echo $data['description']; ?>" class="description">
            <input type="hidden" value="<?php echo $account_model->get_name_by_id($_SESSION['acc_id']); ?>" class="current_acc">
            <?php if($data['task_status_id']=="1") {
                $status = "Open";
                }elseif ($data['task_status_id'] =="2"){
                $status = "In progress";
            }elseif ($data['task_status_id'] == "3"){
                $status = "Solved";
            }elseif ($data['task_status_id'] =="4"){
                $status = "Close";
            }
                ?>
            <td class="status"><?php echo $status;?></td>
        </tr>

        <?php

        }
        ?>
        </tbody>
    </table>
</div>

<div class="menu-task">
    <ul>
        <li><a href="#" id="create-subtask-btn" data-value="" >Create subtask</a></li>
        <li><a href="#" id="view_detail" data-value="">View Detail</a></li>
        <li><a href="#" id="delete_task">Delete</a></li>
    </ul>
</div>

    <div id="task_detail" class="task" title="Task"">

<?php if(!$student_model->is_team_leader($_SESSION['acc_id']) && !$supervisor_model->is_supervisor($_SESSION['acc_id'])) {
    echo "<style> 
            #task_detail table tr:not(:last-child){
                pointer-events: none;
            } 
            
            .edit_task_btn,#create_main_task,#create-subtask-btn, #delete_task{
                display: none;
            }
            
            </style>";
}


    ?>

        <form action="./index.php?action=edit_task&controller=student" method="post">
            <table cellspacing="0" border="0">

                <tr>
                    <td>Priority</td>
                    <td ><input type="text" id="priority" name="priority" class="form-control" value="" placeholder="Low | Medium | High" onkeyup='checkPrio(this);'></td>
                </tr>
                <tr>
                    <td>Task ID</td>
                    <td><input type="text" id="task_id" name="task_id" class="form-control" value=""></td>

                </tr>
                <tr class="parent_task_id_show">
                    <td>Parent Task ID </td>
                    <td><input type="text" id="parent_task_id" name="parent_task_id" class="form-control" value=""></td>

                </tr>
                <tr>
                    <td>Task name</td>
                    <td><input type="text" id="task_name" name="task_name" class="form-control" value=""></td>

                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea rows="5" id="description" cols="50" name="description"></textarea></td>
                </tr>
                <tr>
                    <td>Assign by</td>
                    <td><input type="text" id="assign_by" class="form-control no-click-event" name="assign_by" "></td>
                </tr>
                <tr>
                    <td>Assign to</td>
                    <td><input type="text" id="assign_to" class="form-control" name="assign_to" value=""></td>
                </tr>
                <tr>
                    <td>Start date</td>
                    <td><input type="date" id="start_date" class="form-control no-click-event" name="start_date" value=""></td>
                </tr>
                <tr>
                    <td>Deadline</td>
                    <td><input type="date" id="deadline" class="form-control" name="deadline" value=""></td>
                </tr>
                <tr>
                    <td>Finish date</td>
                    <td><input type="date" id="finish_date" class="form-control no-click-event" name="finish_date" value=""></td>
                </tr>
                <tr>
                    <td>Technique check</td>

                    <td><input type="date" id="tech_check" class="form-control no-click-event" name="tech_check" value="">
                        <?php if($student_model->is_team_leader($_SESSION['acc_id'])){ ?>  Checked<input type="checkbox" id="technique_check" name="technique_check" value="tech_checked"> <?php }?>
                    </td>
                </tr>
                <tr>
                    <td>QA check</td>
                    <td><input type="date" id="qa_check" class="form-control no-click-event" name="qa_check"  value="">
                        <?php if($supervisor_model->is_supervisor($_SESSION['acc_id'])){ ?> Checked<input type="checkbox" name="qa_check" value="qa_checked"> <?php }?>
                    </td>

                </tr>
                <tr>
                    <td>Status</td>
                    <td id="status"></td>
                </tr>

                <tr>
                    <td></td>
                    <td><button class="button edit_task_btn" type="submit" name="edit_task_btn">Edit</button>
                        <button class="button log_bug" type="button" name="log_bug" >Log bug</button>
                        <button type="button" class="cancel-btn button" name="cancel-btn" >Cancel</button></td>
                </tr>
            </table>
        </form>
    </div>

        <div id="create_task" class="task">
            <form class="form-task" action="./index.php?action=create_task&controller=student" method="post">
                <table cellspacing="0" border="0">
                    <tr>
                        <td>Priority</td>

                        <td><select name="priority" class="form-control" >
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Task name</td>
                        <td><input type="text" id="task_name" name="task_name" class="text ui-widget-content ui-corner-all form-control"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea rows="5" cols="50" name="description" class="text ui-widget-content ui-corner-all form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td>Assign to</td>
                        <td><input type="text" name="assign_to" class="text ui-widget-content ui-corner-all form-control"></td>
                    </tr>
                    <tr>
                        <td>Start date</td>
                        <td><input type="date" name="start_date" class="text ui-widget-content ui-corner-all form-control"></td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td><input type="date" name="deadline" class="text ui-widget-content ui-corner-all form-control"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" id="parent_task_id" name="parent_task_id"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="create_subtask_btn button" type="submit" name="create_task_btn"
                                    id="create_task_btn" value="submit">Create</button>
                            <button  type="button" class="cancel-btn button" >Cancel</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


</body>
</html>

<script >

    $(window).on("load", function() {




        $( ".task" ).dialog({
            draggable:false,
            width:"auto",
            resizable:false,
            closeOnEscape: false,
            autoOpen: false,
            modal:true,
            show: {
                effect: "fade",
                duration: 150
            },
            hide: {
                effect: "fade",
                duration: 150
            }
        });

        $( "#create_task_btn").button();
        $(".reset-btn").button();
        $(".edit-btn").button();
        $(".button").button();

        $( "#create_main_task").button().on( "click", function() {
            $(".form-task")[0].reset();
            $( "#create_task_btn" ).val("new_maintask");

            $( "#create_task" ).dialog({
                title: "New Main Task"
            }).dialog( "open" );
        });

        var task_id_value;
        var pointer_btn = $(".pointer_btn");
        var menu_task =$(".menu-task");


        menu_task.hide();
        var $task_detail = $("#task_detail");
        var $create_task = $("#create_task");


        pointer_btn.on("click",function() {
            var $this = $(this).parent().parent();
            var $task_id = $(this).parent().next();
            task_id_value = $task_id.html();

            var top = $(this).offset().top;
            var left = $(this).offset().left;
            if(menu_task.css("display","none")){
                $(this).parent().nextAll().addClass("blur-animated");
                menu_task.fadeIn(100);
                menu_task.css("top",top + 41).css("left",left);
            }


            $(this).parent().parent().prevAll().find("td").removeClass("blur-animated");
            $(this).parent().parent().nextAll().find("td").removeClass("blur-animated");


            $("#create-subtask-btn").on("click", function () {
                $(".menu-task").hide();
                $("tbody").find("td").removeClass("blur-animated");
                $create_task.find("#task_name").val(task_id_value);
                $create_task.dialog({
                    title: "New Task"
                }).dialog("open");
            });

            $( "#view_detail" ).on( "click", function() {



                $task_detail.find("#priority").blur();

                if($this.find(".assign_to").html() !== $(".current_acc").val()){
                    //$task_detail.find(".log_bug").addClass("no-click-event");
                }
                $task_detail.find("#task_id").val($this.find(".task_id").html());
                var parent_task_id = $this.find(".parent_task_id").val();
                if( parent_task_id === ""){
                    $task_detail.find("#parent_task_id").val("No parent task.");
                }else{
                    $task_detail.find("#parent_task_id").val(parent_task_id);
                }
                $task_detail.find("#task_name").val($this.find(".task_name").html());
                 var prio = $this.find(".priority").html();
                $task_detail.find("#priority").val(prio);
                $task_detail.find("#description").html($this.find(".description").val());
                $task_detail.find("#assign_by").val($this.find(".assign_by").html());
                $task_detail.find("#assign_to").val($this.find(".assign_to").html());
                $task_detail.find("#start_date").val($this.find(".start_date").html());
                $task_detail.find("#deadline").val($this.find(".deadline").html());
                $task_detail.find("#finish_date").val($this.find(".finish_date").html());
                $task_detail.find("#qa_check").val($this.find(".qa_check_date").html());
                if($this.find(".technique_check_date").html() !== ""){
                    $task_detail.find("#technique_check").attr("checked",true);
                }else{
                    $task_detail.find("#technique_check").attr("checked",false);
                }
                if($this.find(".qa_check_date").html() !== ""){
                    $task_detail.find("#qa_check").attr("checked",true);
                }
                else{
                    $task_detail.find("#qa_check").attr("checked",false);
                }
                $task_detail.find("#tech_check").val($this.find(".technique_check_date").html());
                $task_detail.find("#status").html($this.find(".status").html());
                $( "#task_detail" ).dialog({
                    title: "Task Detail"
                }).dialog( "open" );
                $("#priority").on("blur",function () {
                    var prio_regexp = new RegExp('Medium|High|Low');
                    if(!prio_regexp.test($("#priority").val())){
                        alert("You must enter one of these Priority \n Low | Medium | High");
                        $("#priority").focus();
                    }
                }) ;
            });

            $( ".cancel-btn" ).on( "click", function() {
                $( "#task_detail" ).dialog( "close" );
                $( "#create_task" ).dialog( "close" );
            });


            $(document).on("click", function (e) {
                if ($(e.target).is(".menu-task")===false&&$(e.target).is( pointer_btn)===false) {
                    $(".menu-task").hide();
                    $("tbody").find("td").removeClass("blur-animated");
                }
            });
        });
        $("thead").find("tr th").removeClass("sorting_asc").removeClass("sorting");

    } );


</script>