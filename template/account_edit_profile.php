<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
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
    <script src="./js/spmfu.js"></script>
    <link rel="stylesheet" href="./css/main.css">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
    <?php require_once(SITE_ROOT."/template/header.php"); ?>
</head>

<body>
<div class="limiter">

    <div class="container-login100">
        <div class="wrap-login100" style="color: white; width: 400px;margin-top: -1em;">
            <form class="login100-form" action="./index.php?action=edit_profile&controller=account" method="post">
                <span class="login100-form-logo" style="width: 150px">
                    <img src="<?php echo $detail['profile_picture']; ?>" width="250px"/>
                </span>
                <span><button class="login100-form-btn" type="button" name="upload_avatar" value="" onclick="" style="margin: 0 auto;">Upload</button></span>

<table cellspacing="0" border="0" style="margin: 0 auto;">
    <tr>

        <td>
            <?php
            if($role == "1"){
                        ?>
                <tr>
                    <td>Student ID: </td>
                    <td><?php echo $detail['student_id']; ?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td>Fullname: </td>
                    <td><?php echo $detail['full_name']; ?></td>
                </tr>

                <tr>
                    <td>Gender: </td>
                    <td><input type="radio" class="no-click-event" name="gender" value="male" <?php if(strtolower($detail['gender'])=="male") echo 'checked="checked"';?>/>Male
                        <input type="radio" class="no-click-event" name="gender" value="female"<?php if(strtolower($detail['gender'])=="female") echo 'checked="checked"';?>/>Female
                    </td>
                </tr>
                <?php
                if($role=="1"){
                    ?>
                    <tr>
                        <td>Date of Birth:</td>
                        <td><?php echo date("d-m-Y", strtotime($detail['dob'])); ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td>Phone: </td>
                    <td> <input class="form-control" type="text" name="phone" value="<?php echo $detail['phone']; ?>" ></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $detail['email']; ?></td>
                </tr>
                <?php
                if($role=="1"){
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
                    ?>
                    <tr>
                        <td>Role:</td>
                        <td><?php
                            if($role == "1") echo "Student";
                            if($role == "2") echo "Supervisor";
                            if($role == "3") echo "Academic Staff";
                            if($role == "4") echo "Administrator";
                            if($role == "5") echo "Supervisor Head";
                        ?></td>
                    </tr>
                </td>
                <?php
                if($role=="1") {
                ?>
                <td>

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
                            if($team_info != null) {
                                echo $detail['isteamleader'] ? "Team Leader<br>" : "";
                                echo $detail['isdocleader'] ? "Document Team Leader<br>" : "";
                                echo $detail['isdaleader'] ? "Design and Analysis Team Leader<br>" : "";
                                echo $detail['isdevleader'] ? "Developing Team Leader<br>" : "";
                                echo $detail['istestleader'] ? "Testing Team Leader<br>" : "";
                                if ($detail['isteamleader'] == 0 && $detail['isdocleader'] == 0 && $detail['isdaleader'] == 0
                                    && $detail['isdevleader'] == 0 && $detail['istestleader'] == 0) {
                                    echo "Team Member";
                                }
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
    <button class="login100-form-btn" type="submit" name="edit">Edit</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <button class="login100-form-btn" type="reset" name="reset">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <button class="login100-form-btn" type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'">Cancel</button>
        </div>
    </td>
</form></div></div></div>

</body>
</html>