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

</head>

<?php require_once(SITE_ROOT."/template/header.php"); ?>

<body>
<div class="limiter">

    <div class="container-login100" style="background-image: url('./image/bg-01.jpg');">
        <div class="wrap-login100" style="color: white; width: auto">


                <span class="login100-form-title p-b-34 p-t-27">
						CREATE MEETING REQUEST
					</span>
    <form action="" method="post">
        <table cellspacing="0" border="0">
            <tr>
                <td>Team:</td>
                <td>
                    <select name="team" class="form-control">
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
                    <select name="slot" class="form-control">
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
                <td><input type="date" name="date" class="form-control"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea rows="5" cols="40" name="description" class="form-control" ></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                <div class="container-login100-form-btn" >
                    <button class="login100-form-btn" type="submit" name="send_button" value="send" style="float: left; margin-right: 40px">Send</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="login100-form-btn" type="button" name="cancel" style="float: left; margin-right: 40px" onclick="window.location.href='./index.php?action=homepage&controller=account'">Back</button>
                </div>
                </td>
            </tr>
        </table>
    </form></div></div></div>
</body>
</html>
