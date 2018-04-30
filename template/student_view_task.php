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
$role = $_SESSION['role_id'];
$team_id = $_SESSION['team_id'];
$student= new student_model();
$task_data = $student->get_task_data($team_id);
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="/css/spmfu.css">
    <script>


    $( function() {
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

        $( "#create_task_btn" ).button();

        $( "#create_main_task" ).button().on( "click", function() {

            $( "#create_task_btn" ).val("new_maintask");

            $( "#create_task" ).dialog({
                title: "New Main Task"
            }).dialog( "open" );
        });

        $( ".create_subtask_btn" ).on( "click", function() {
            var $task_id = $(this).parent().next();
            var task_id_value = $task_id.data("value");
            $("#task_id").val(task_id_value);
            $( "#create_task_btn" ).val("new_subtask");

            $( "#create_task" ).dialog({
                title: "New Subtask"
            }).dialog( "open" );

        });

        $( ".clickable" ).on( "click", function() {
            $( "#task_detail" ).dialog({
                title: "Task Detail"
            }).dialog( "open" );
        });

        $( ".cancel-btn" ).button().on( "click", function() {
            $( "#task_detail" ).dialog( "close" );
            $( "#create_task" ).dialog( "close" );
        });

        $("#detail_priority").on("load",function (){
            var task_prio = $(this).data("value");
            if(task_prio === "High"){

            }else if(task_prio === "Medium"){

            }else if(task_prio === "Low"){

            }
        });

    } );

    </script>

    <style>
    table.table.table-striped.table-bordered tbody tr td.clickable {
        cursor: pointer;
    }

    table.table.table-striped.table-bordered tbody tr td.first-col{
        border-bottom-color: white !important;
    }
    button:focus{
        outline: 0;
    }
    .first-col{
        background-color: white;
        /*pointer-events: none;*/
    }
        .create_subtask_btn{
            cursor: pointer;
        }
    background-image: url('./image/bg-01.jpg');
        #task_table{

        }
    #create_main_task{
        background: -moz-linear-gradient(bottom, #7579ff, #b224ef);
        background-color: rgba(0, 0, 0, 0);
        background-image: -moz-linear-gradient(center bottom , rgb(117, 121, 255), rgb(178, 36, 239));
        background-repeat: repeat;
        background-attachment: scroll;
        background-clip: border-box;
        background-origin: padding-box;
        background-position-x: 0%;
        background-position-y: 0%;
        background-size: auto auto;
        color: white;
    }
 .ui-dialog.ui-corner-all.ui-widget.ui-widget-content.ui-front{
    background: -moz-linear-gradient(bottom, #7579ff, #b224ef);
    background-color: rgba(0, 0, 0, 0);
    background-image: -moz-linear-gradient(center bottom , rgb(117, 121, 255), rgb(178, 36, 239));
    background-repeat: repeat;
    background-attachment: scroll;
    background-clip: border-box;
    background-origin: padding-box;
    background-position-x: 0%;
    background-position-y: 0%;
    background-size: auto auto;
    top: 150px;
}

    .ui-widget input, .ui-widget select, .ui-widget textarea{
        font-size: 0.8em;
        top: 100px;
    }
    .ui-dialog.ui-corner-all.ui-widget.ui-widget-content.ui-front{
        top: 100px;
    }
    </style>

</head>


<body>
<div class="limiter">

    <div class="container-login100" style="background-image: url('./image/bg-01.jpg');">

<div>
    <table>
    <button type="button" id="create_main_task" name="create_main_task">Create new task</button>
        </table></div>
<div>
    <table id="task_table" class="table table-striped table-bordered" style="background: rgba(6, 0, 255, 0.54);color: white;">
        <thead>
        <tr>
            <th></th>
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
            <td class="first-col"><img class="create_subtask_btn" src="../image/icons/plus_icon.png" width="20px"> </td>
            <td class="clickable" data-value="<?php echo $data['task_id']; ?>"><?php echo $data['task_id']; ?></td>
            <td class="clickable"><?php echo $data['priority']; ?></td>
            <td class="clickable"><?php echo $data['task_name']; ?></td>
            <td class="clickable"><?php echo $data['assign_by']; ?></td>
            <td class="clickable"><?php echo $data['assign_to']; ?></td>
            <td class="clickable"><?php echo $data['start_date']; ?></td>
            <td class="clickable"><?php echo $data['deadline']; ?></td>
            <td class="clickable"><?php echo $data['finish_date']; ?></td>
            <td class="clickable"><?php echo $data['technique_check_date']; ?></td>
            <td class="clickable"><?php echo $data['qa_check_date']; ?></td>
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
            <td class="clickable"><?php echo $status;?></td>
        </tr>
        <?php

        }
        ?>
        </tbody>
    </table>
</div>


    <div id="task_detail" class="task" title="Task"">
        <form>
            <table cellspacing="0" border="0">

                <tr>
                    <td>Priority</td>
                    <td><select class="form-control" id="detail_priority" data-value="<?php echo $data['priority']; ?>">
                            <option>High</option>
                            <option>Medium</option>
                            <option>Low</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Task name</td>
                    <td><input type="text" name="taskname" class="form-control" value="<?php echo $data['priority']; ?>"></td>

                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea rows="5" cols="50" name="description"><?php echo $data['priority']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Assign by</td>
                    <td><input type="text" class="form-control" name="assign_by" value="<?php echo $data['priority']; ?>"></td>
                </tr>
                <tr>
                    <td>Assign to</td>
                    <td><input type="text" class="form-control" name="assign_to" value="<?php echo $data['priority']; ?>"></td>
                </tr>
                <tr>
                    <td>Start date</td>
                    <td><input type="date" class="form-control" name="start_date" value="<?php echo $data['priority']; ?>"></td>
                </tr>
                <tr>
                    <td>Deadline</td>
                    <td><input type="date" class="form-control" name="deadline" value="<?php echo $data['priority']; ?>"></td>
                </tr>
                <tr>
                    <td>Finish date</td>
                    <td><input type="date" class="form-control" name="finish_date" value="<?php echo $data['priority']; ?>"></td>
                </tr>
                <tr>
                    <td>Technique check</td>
                    <td><input type="date" class="form-control" name="tech_check" value="<?php echo $data['priority']; ?>"></td>
                </tr>
                <tr>
                    <td>QA check</td>
                    <td><input type="date" class="form-control" name="qa_check" value="<?php echo $data['priority']; ?>"></td>

                </tr>
                <tr>
                    <td>Status</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="button" type="submit" name="edit">Edit</button>
                        <button class="button" type="reset" >Reset</button>
                        <button type="button" class="cancel-btn" name="cancel-btn" >Cancel</button></td>
                </tr>
            </table>
        </form>
    </div>

        <div id="create_task" class="task">
            <form>
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
                        <td><input type="text" name="taskname" class="text ui-widget-content ui-corner-all form-control"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea rows="5" cols="50" name="description" class="text ui-widget-content ui-corner-all form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="assign_by" class="text ui-widget-content ui-corner-all form-control"></td>
                    </tr>
                    <tr>
                        <td>Assign to</td>
                        <td><input type="text" name="assign_to" class="text ui-widget-content ui-corner-all form-control"></td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td><input type="date" name="deadline" class="text ui-widget-content ui-corner-all form-control"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" id="task_id" name="task_id"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="create_subtask_btn button" type="button" name="create_task_btn" id="create_task_btn"
                            onclick="window.location='./index.php?action=create_task&controller=student'">Create</button>
                            <button type="button" class="cancel-btn login-button" >Cancel</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

</body>
</html>
