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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="./css/spmfu.css">-->
    <link href="./css/one-page-wonder.min.css" rel="stylesheet">
</head>
<nav class=".navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <a class="navbar-brand" href="index.php"><img src="./image/Logo-FU-01.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=display_all_account_info&controller=staff">View account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=create_account&controller=staff">Create account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=view_profile&controller=account">View profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=edit_profile&controller=account">Edit profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=change_password&controller=account">Change password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=logout&controller=account">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<body style="margin: 150px 0">
<div class="main-login main-center">
<form>
    <table cellspacing="0" border="1">
        <tr>
            <td><h2 class="text-center">PROFILE
                </h2>
                <table>
                    <tr>
                        <td>
                            <img src="<?php
                            echo $detail['profile_picture'];
                            ?>" width="250px">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <button type="button" name="upload_avatar" value="" onclick="">Upload</button>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>Fullname: </td>
                        <td><?php echo $detail['full_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Gender: </td>
                        <td><input type="radio" name="gender" value="male" disabled<?php if($detail['gender']=="male") echo 'checked="checked"';?>/>Male
                            <input type="radio" name="gender" value="female" disabled<?php if($detail['gender']=="female") echo 'checked="checked"';?>/>Female
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
                        <td><input type="text" name="phone" value="<?php echo $detail['phone']; ?>" ></td>
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
                <td>
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
                                echo "Team Member";
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
    <button type="submit" name="edit">Edit</button>
    <button type="reset" name="reset">Reset</button>
    <button type="button" name="cancel" onclick="window.location.href='./index.php?action=homepage&controller=account'">Cancel</button>
</form></div>
</body>
</html>
