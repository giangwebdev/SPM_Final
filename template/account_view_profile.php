<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
$account = new account();
$account->check_Session();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #keoxuong{
            padding-top: 20px;
        }

        tr{

            vertical-align: top;
        }
    </style>
</head>
<body>
        <table cellspacing="0" border="1">
            <tr>
                <td align="center"> Profile
                    <table>
                        <tr>
                            <td>
                                <img src="<?php echo $detail['profile_picture']; ?>" width="250px"/>
                            </td>
                        </tr>
                    </table>
                </td>
                <td id="keoxuong">
                    <table>
                        <tr>
                            <td>Fullname: </td>
                            <td><?php echo $detail['full_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Gender: </td>
                            <td ><input type="radio" name="gender" value="male" disabled <?php if($detail['gender']=="male") echo 'checked="checked"';?>/>Male
                                <input type="radio" name="gender" value="female" disabled <?php if($detail['gender']=="female") echo 'checked="checked"';?>/>Female
                            </td>
                        </tr>
                        <?php
                        if($_SESSION['role_id']=="1"){
                            ?>
                            <tr>
                            <td>Date of Birth:</td>
                            <td><?php echo $detail['dob']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td>Phone: </td>
                            <td><?php echo $detail['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $detail['email']; ?></td>
                        </tr>
                        <?php
                        if($_SESSION['role_id']=="1"){
                        ?>
                        <tr>
                            <td>Major:</td>
                            <td><?php echo $detail['major']; ?></td>
                        </tr>
                        <tr>
                            <td>Campus:</td>
                            <td><?php echo $detail['campus']; ?></td>
                        </tr>
                        <?php
                        }
                        if($_SESSION['role_id']=="3"){
                            ?>
                            <tr>
                                <td>Role:</td>
                                <td><?php echo $detail['isadmin']?"Administrator":"Academic Staff"; ?></td>
                            </tr>
                            <?php
                        }
                        if($_SESSION['role_id']=="2"){
                            ?>
                            <tr>
                                <td>Role:</td>
                                <td><?php echo $detail['issupervisorhead']?"Supervisor Head":"Supervisor"; ?></td>
                            </tr>
                        <?php
                        }
                        if($_SESSION['role_id']=="1"){
                            ?>
                            <tr>
                                <td>Role:</td>
                                <td>Student</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </td>
                <?php
                if($_SESSION['role_id']=="1") {
                    ?>
                    <td id="keoxuong">
                        <table>
                            <tr>
                                <td>Team:</td>
                                <td><?php
                                        require_once (SITE_ROOT."/models/student_model.php");
                                        $team = new student_model();
                                        $team_info = $team->get_team_info();
                                        foreach ($team_info as $info){
                                            echo $info['team_name'];
                                        }

                                    ?></td>
                            </tr>
                            <tr>
                                <td>Role in team:</td>
                                <td>
                                    <?php
                                    echo $detail['isteamleader']?"Team Leader<br>":"";
                                    echo $detail['isdocleader']?"Document Team Leader<br>":"";
                                    echo $detail['isdaleader']?"Design and Analysis Team Leader<br>":"";
                                    echo $detail['isdevleader']?"Developing Team Leader<br>":"";
                                    echo $detail['istestleader']?"Testing Team Leader<br>":"";
                                    if($detail['isteamleader']==0 && $detail['isdocleader']==0 &&$detail['isdaleader']==0
                                        &&$detail['isdevleader']==0 &&$detail['istestleader']==0){
                                        echo "Team Member";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <?php
                }
                ?>
            </tr>
        </table>
        <button type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'">Back</button>
</body>
</html>