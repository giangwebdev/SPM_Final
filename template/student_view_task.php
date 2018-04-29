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
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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



        $( "#create_main_task" ).button().on( "click", function() {
            $( ".create_task_btn" ).attr();
            $( "#create_task" ).dialog({
                title: "New Main Task"
            }).dialog( "open" );
        });

        $( ".create_subtask_btn" ).on( "click", function() {
            $( ".create_task_btn" )
            $( "#create_task" ).dialog({
                title: "New Subtask"
            }).dialog( "open" );

        });

        $( ".create_task_btn" ).on( "click", function() {
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
    </style>
</head>
<body>
<div><button type="button" id="create_main_task" name="create_main_task">Create new task</button></div>
<div>
    <table id="task_table" class="table table-striped table-bordered">
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

        ?>
        <tr>
            <td class="first-col"><img class="create_subtask_btn" src="../image/icons/plus_icon.png" width="20px" > </td>
            <td class="clickable"></td>
            <td class="clickable"></td>
            <td class="clickable"></td>
            <td class="clickable"></td>
            <td class="clickable"></td>
            <td class="clickable"></td>
            <td class="clickable"></td>
            <td class="clickable"></td>
            <td class="clickable"></td>
            <td class="clickable"></td>
            <td class="clickable"></td>
        </tr>
        </tbody>
    </table>
</div>


    <div id="task_detail" class="task" title="Task">
        <form>
            <table cellspacing="0" border="0">

                <tr>
                    <td>Priority</td>
                    <td><select>
                            <option>High</option>
                            <option>Medium</option>
                            <option>Low</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Task name</td>
                    <td><input type="text" name="taskname"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea rows="5" cols="50" name="description"></textarea></td>
                </tr>
                <tr>
                    <td>Assign by</td>
                    <td><input type="text" name="assign_by"></td>
                </tr>
                <tr>
                    <td>Assign to</td>
                    <td><input type="text" name="assign_to"></td>
                </tr>
                <tr>
                    <td>Start date</td>
                    <td><input type="date" name="start_date"></td>
                </tr>
                <tr>
                    <td>Deadline</td>
                    <td><input type="date" name="deadline" value=""></td>
                </tr>
                <tr>
                    <td>Finish date</td>
                    <td><input type="date" name="finish_date"></td>
                </tr>
                <tr>
                    <td>Technique check</td>
                    <td><input type="date" name="tech_check"></td>
                </tr>
                <tr>
                    <td>QA check</td>
                    <td><input type="date" name="qa_check"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="edit">Edit</button>
                        <button type="reset" >Reset</button>
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
                        <td><select name="priority">
                                <option value="">High</option>
                                <option value="">Medium</option>
                                <option value="">Low</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Task name</td>
                        <td><input type="text" name="taskname" class="text ui-widget-content ui-corner-all"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea rows="5" cols="50" name="description" class="text ui-widget-content ui-corner-all"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="assign_by" class="text ui-widget-content ui-corner-all"></td>
                    </tr>
                    <tr>
                        <td>Assign to</td>
                        <td><input type="text" name="assign_to" class="text ui-widget-content ui-corner-all"></td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td><input type="date" name="deadline" class="text ui-widget-content ui-corner-all"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="button" name="create_task_btn" id="create_task_btn"
                            onclick="window.location='./index.php?action=create_task&controller=student'">Create</button>
                            <button type="button" class="cancel-btn" >Cancel</button></td>
                    </tr>
                </table>
            </form>
        </div>
</body>
</html>
