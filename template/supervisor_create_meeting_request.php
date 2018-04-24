<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/20/2018
 * Time: 3:36 PM
 */
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/supervisor_controller.php");
require_once (SITE_ROOT."/models/supervisor_model.php");

$account = new account();
$account->check_Session();
$super_model = new supervisor_model();
$team_data = $super_model->get_my_team();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create meeting request</h1>
    <form action="./index.php?action=create_meeting_request&controller=supervisor" method="post">
        <table border="0">
            <tr>
                <td>Team:</td>
                <td>
                    <select name="team">
                        <option>--Choose team--</option>
                        <?php
                        foreach ($team_data as $key => $data){
                                ?>
                                <option value=' <?php echo $team_data[$key]['team_id']; ?> '>
                                    <?php echo  $team_data[$key]['team_name']; ?>
                                </option>
                                <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Slot:</td>
                <td>
                    <select name="slot">
                        <?php
                        for($i=1;$i <=8;$i++){
                            echo "<option value='$i' >$i</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Date:</td>
                <td><input type="date" name="date"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea rows="5" cols="40" name="description"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="send_button" value="send">Send</button>
                    <button type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'">Back</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
