<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
$account = new account();
$account->check_Session();
$role=$_SESSION['role_id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="./js/spmfu.js"></script>
    <link rel="stylesheet" href="./css/main.css">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
    <?php require_once(SITE_ROOT."/template/header.php"); ?>
</head>

<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100" style="color: white; width: 400px;margin-top: -1em;">
            <form class="login100-form" action="./index.php?action=admin_edit_profile&controller=staff" method="post">
                <span class="login100-form-logo" style="width: 150px">
                    <img src="<?php echo $detail['profile_picture']; ?>" width="250px"/>
                </span>
                        <table cellspacing="0" border="0" style="margin: 0 auto;">
                            <tr>

                                <td>
                                    <?php
                                    if($acc_role == "1"){
                                    ?>
                            <tr>
                                <td>Student ID: </td>
                                <td><input type="text" name="student_id" value="<?php echo $detail['student_id']; ?>"></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td>Fullname: </td>
                                <td><input type="text" name="full_name" value="<?php echo $detail['full_name']; ?>"></td>
                            </tr>

                            <tr>
                                <td>Gender: </td>
                                <td><input type="radio" name="gender" value="male" <?php if($detail['gender']=="male") echo 'checked="checked"';?>/>Male
                                    <input type="radio"  name="gender" value="female"<?php if($detail['gender']=="female") echo 'checked="checked"';?>/>Female
                                </td>
                            </tr>
                            <?php
                            if($acc_role=="1"){
                                ?>
                                <tr>
                                    <td>Date of Birth:</td>
                                    <td><input type="date" name="dob" value="<?php echo $detail['dob']; ?>"></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td>Phone: </td>
                                <td><input type="text" name="phone" value="<?php echo $detail['phone']; ?> "></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="email" value="<?php echo $detail['email']; ?>"></td>
                            </tr>
                            <?php
                            if($acc_role=="1"){
                                ?>
                                <tr>
                                    <td>Major:</td>
                                    <td><input type="text" name="major" value="<?php echo $detail['major']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Campus:</td>
                                    <td><input type="text" name="campus" value="<?php echo $detail['campus']; ?>"></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td>Role:</td>
                                <td>
                                    <select name="role">
                                        <option <?php if($acc_role == "1") echo "selected"; ?> value="1">Student</option>
                                        <option <?php if($acc_role == "2") echo "selected"; ?> value="2">Supervisor</option>
                                        <option <?php if($acc_role == "3") echo "selected"; ?> value="3">Academic Staff</option>
                                        <option <?php if($acc_role == "4") echo "selected"; ?> value="4">Administrator</option>
                                        <option <?php if($acc_role == "5") echo "selected"; ?> value="5">Supervisor Head</option>
                                    </select>



                                </td>
                            </tr>
                            </td>
                            <?php
                            if($acc_role=="1") {
                                ?>
                                <td>

                                    <tr>
                                        <td>Team:</td>
                                        <td><?php
                                            require_once (SITE_ROOT."/models/student_model.php");
                                            $team = new student_model();
                                            $team_info = $team->get_team_info_by_id($detail['acc_id']);
                                            foreach ($team_info as $info){
                                                if($info['team_name'] != null){
                                                    echo $info['team_name'];
                                                }else{
                                                    echo "<span style=\"color:yellow\">This user isn't in any team. </span>";
                                                }

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

                                </td>
                                <?php
                            }
                            ?>
                            </tr>
                        </table><br>
                        <td><div class="container-login100-form-btn" >
                                <input type="hidden" name="acc_id" value="<?php echo $detail['acc_id']; ?>">
                                <input type="hidden" name="acc_role" value=" <?php echo $acc_role; ?>">
                                <button class="login100-form-btn" type="submit" name="edit" value="edit">Edit</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="login100-form-btn" type="reset" name="reset">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="login100-form-btn" type="button" name="cancel" onclick="window.location.href='./index.php?action=display_all_account_info&controller=staff'">Cancel</button>
                            </div>
                        </td>
                    </form>
        </div>
    </div>
</div>


</body>

</html>
