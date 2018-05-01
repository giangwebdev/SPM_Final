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
$account = new account();
$account->check_Session();
$role = $_SESSION['role_id'];
$team_id = $_SESSION['team_id'];
$student= new student_model();
$task_data = $student->get_task_data($team_id);
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
    <link rel="stylesheet" href="./css/spmfu.css">
    <script src="./js/spmfu.js"></script>



</head>


<body style="background-image: url('./image/bg-01.jpg');">

<div class="limiter">
    <div class="row-1">
        <button type="button" id="create_main_task" name="create_main_task">Create new task</button>
    </div>
    <div class="container-login100" >
<div class="row-2">
    <table id="task_table" class="table table-striped table-bordered" style="color: white;">
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
            <td data-value="<?php echo $data['task_id']; ?>"><?php echo $data['task_id']; ?></td>
            <td><?php echo $data['priority']; ?></td>
            <td><?php echo $data['task_name']; ?></td>
            <td><?php echo $data['assign_by']; ?></td>
            <td><?php echo $data['assign_to']; ?></td>
            <td><?php echo $data['start_date']; ?></td>
            <td><?php echo $data['deadline']; ?></td>
            <td><?php echo $data['finish_date']; ?></td>
            <td><?php echo $data['technique_check_date']; ?></td>
            <td><?php echo $data['qa_check_date']; ?></td>
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
                    <td><input type="text" name="taskname" class="form-control" value="<?php echo $data['task_name']; ?>"></td>

                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea rows="5" cols="50" name="description"><?php echo $data['description']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Assign by</td>
                    <td><input type="text" class="form-control" name="assign_by" value="<?php echo $data['assign_by']; ?>"></td>
                </tr>
                <tr>
                    <td>Assign to</td>
                    <td><input type="text" class="form-control" name="assign_to" value="<?php echo $data['assign_to']; ?>"></td>
                </tr>
                <tr>
                    <td>Start date</td>
                    <td><input type="date" class="form-control" name="start_date" value="<?php echo $data['start_date']; ?>"></td>
                </tr>
                <tr>
                    <td>Deadline</td>
                    <td><input type="date" class="form-control" name="deadline" value="<?php echo $data['deadline']; ?>"></td>
                </tr>
                <tr>
                    <td>Finish date</td>
                    <td><input type="date" class="form-control" name="finish_date" value="<?php echo $data['finish_date']; ?>"></td>
                </tr>
                <tr>
                    <td>Technique check</td>
                    <td><input type="date" class="form-control" name="tech_check" value="<?php echo $data['technique_check_date']; ?>"></td>
                </tr>
                <tr>
                    <td>QA check</td>
                    <td><input type="date" class="form-control" name="qa_check" value="<?php echo $data['qa_check_date']; ?>"></td>

                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php if($data['task_status_id']=="1") {
                            $status = "Open";
                        }elseif ($data['task_status_id'] =="2"){
                            $status = "In progress";
                        }elseif ($data['task_status_id'] == "3"){
                            $status = "Solved";
                        }elseif ($data['task_status_id'] =="4"){
                            $status = "Close";
                        }
                        echo $status;
                        ?></td>
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
                            <button type="button" class="cancel-btn button" >Cancel</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<div class="menu-task">
    <ul>
        <li><a href="#" id="create-subtask-btn">Create subtask</a></li>
        <li><a href="#" id="view_detail">View</a></li>
        <li><a href="#" >Delete</a></li>
    </ul>
</div>
</body>
</html>
