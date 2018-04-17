<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");
$account = new account();
//$account->check_Session();

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
        <table cellspacing="0" border="1">
            <tr>
                <td> Profile: </td>
                <td>
                    <table>
                        <tr>
                            <td>Fullname: </td>
                            <td><?php echo $detail['full_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Gender: </td>
                            <td><?php echo $detail['gender']; ?></td>
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
                        <tr>
                            <td>Major:</td>
                            <td><?php echo $detail['major']; ?></td>
                        </tr>
                        <tr>
                            <td>Campus:</td>
                            <td><?php echo $detail['campus']; ?></td>
                        </tr>
                        <?php
                        if($_SESSION['role_id']=="3"){
                            ?>
                            <tr>
                                <td>Role:</td>
                                <td><?php echo $detail['isadmin']?"Administrator":"Academic Staff"; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>Team:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Role in team:</td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
</body>
</html>