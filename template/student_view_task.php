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
        $( ".clickable-row" ).on( "click", function() {
            $( "#task_detail" ).dialog( "open" );
        });

        $( ".create_task_btn" ).on( "click", function() {
            $( "#create_task" ).dialog( "open" );
        });

        $( ".cancel-btn" ).on( "click", function() {
            $( "#task_detail" ).dialog( "close" );
            $( "#create_task" ).dialog( "close" );
        });

    } );

    $(function () {
        var priority= $('priority'),
            taskname = $('taskname'),
            description = $('description'),
            created_by= $('created_by'),
            assign_by = $('assign_by'),
            assign_to= $('assign_to'),
            deadline = $('deadline'),
            start_date= $('start_date'),
            finish_date= $('finish_date'),
            technique_check= $('technique_check'),
            qa_check= $('qa_check'),
            status= $('status'),
            dialog,form,
            allFields = $([]).add(priority).add(taskname).add(description).add(created_by).add(assign_by).add(assign_to)
                .add(start_date).add(deadline).add(finish_date).add(technique_check).add(qa_check).add(status)
            ;

        function create_task(){
            $.ajax({
                url: "../ajax_Handler.php",
                type: 'POST',
                data: {
                    priority:priority.val(),
                    taskname:taskname.val(),
                    description:description.val(),
                    created_by:created_by.val(),
                    assign_by:assign_by.val(),
                    assign_to:assign_to.val(),
                    deadline:deadline.val(),
                    start_date:start_date.val(),
                    finish_date:finish_date.val(),
                    technique_check:technique_check.val(),
                    qa_check:qa_check.val(),
                    status:status.val()
                },
                success: function(data) {
                    $('#new').html(data);
                    $( "#users").find("tbody" ).append( "<tr>"+
                        "<td class='first-row'><img class='create_task_btn' src='../image/icons/plus_icon.png' width='20px' ></td>"+
                        "<td class='clickable-row'>"+ +"</td>"+
                        "<td class='clickable-row'>"+priority.val() +"</td>"+
                        "<td class='clickable-row'>"+ taskname.val()+"</td>"+
                        "<td class='clickable-row'>"+ assign_by.val()+"</td>"+
                        "<td class='clickable-row'>"+assign_to.val() +"</td>"+
                        "<td class='clickable-row'>"+ start_date.val()+"</td>"+
                        "<td class='clickable-row'>"+ deadline.val()+"</td>"+
                        "<td class='clickable-row'>"+finish_date.val() +"</td>"+
                        "<td class='clickable-row'>"+ technique_check.val()+"</td>"+
                        "<td class='clickable-row'>"+qa_check.val()+"</td>"+
                        "<td class='clickable-row'>"+status.val() +"</td>"+ "</tr>");
                    dialog.dialog( "close" );
                },
                error: function(error) {
                    alert("Loi roi!" + error);
                }
            });
        }

        dialog = $( "#create-task" ).dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            draggable: false,
            modal: true,
            buttons: {
                "Create an account": create_task,
                Cancel: function() {
                    dialog.dialog( "close" );
                }
            },
            close: function() {
                form[ 0 ].reset();
                allFields.removeClass( "ui-state-error" );
            }
        });

        form = dialog.find( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            create_task();
        });

        $( ".create-task-btn" ).button().on( "click", function() {
            dialog.dialog( "open" );
        });

    });


    </script>

    <style>
    table.table.table-striped.table-bordered tbody tr td.clickable-row {
        cursor: pointer;
    }

    table.table.table-striped.table-bordered tbody tr td.first-row {
        border-bottom-color: white !important;
    }
    button:focus{
        outline: 0;
    }
    .first-row{
        background-color: white;
        /*pointer-events: none;*/
    }
        .create_task_btn{
            cursor: pointer;
        }
    </style>
</head>
<body>
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
        <tbody>
        <tr>
            <td class="first-row"><img class="create_task_btn" src="../image/icons/plus_icon.png" width="20px" > </td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
            <td class="clickable-row"></td>
        </tr>
        </tbody>
    </table>
</div>


    <div id="task_detail" class="task" title="Task ">
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

        <div id="create_task" class="task" title="New Task">
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
                        <td><button type="submit" name="edit">Create</button>
                            <button type="button" class="cancel-btn" >Cancel</button></td>
                    </tr>
                </table>
            </form>
        </div>
</body>
</html>
